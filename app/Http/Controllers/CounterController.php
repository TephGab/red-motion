<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $acs = Counter::with('user')->where('user_id', $userId)->first();

        return response()->json(["acs"=>$acs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wordToremove = array("Review", "of", "has", "Do", "you", "want", "to", "dismiss", "this", "Session", "been", "set", "-", "?", ".", "x");
        $stringWordRemoved = str_replace($wordToremove,"", $request->acs);
        $trimWordRemoved = trim($stringWordRemoved); 
        $nameRemoved = preg_replace("/\(([^()]*+|(?R))*\)/","", $trimWordRemoved); 
        $allWhiteSpaceRemoved = preg_replace('/\s+/', '',  $nameRemoved); 
        $completedArray = array();
        $restartArray = array();
        $duplicatesArray = array();
        //loop on completed
        $tempCompleted = null;
        $tempRestart = null;

        while (strlen($allWhiteSpaceRemoved) >= 1) {
            $isCompletedOrRestartCheck = substr($allWhiteSpaceRemoved, 0, 10);
            if (str_ends_with($isCompletedOrRestartCheck, 'c')) {
                        $tempCompleted = substr($allWhiteSpaceRemoved, 0, 18);
                        $allWhiteSpaceRemoved = substr($allWhiteSpaceRemoved, 18);
                        //Format completed ac
                        $part1 = substr($tempCompleted, 0, 3);
                        $part2 = substr($tempCompleted, 3, 3);
                        $part3 = substr($tempCompleted, 6, 3);
                        $part4 = substr($tempCompleted, 9, 9);
                        $part1 = '('.$part1.'-';
                        $part2 = $part2.'-';
                        $part3 = $part3.'-';
                        $part4 = $part4.') ';
                        $formatedCompletedAC = $part1.$part2.$part3.$part4;
                        $checkRestartDuplicateFormat = $part1.$part2.$part3.'restart) ';
                        
                        //Checking for duplicates access codes -- completed
                        if(in_array($formatedCompletedAC, $completedArray)) {
                            array_push($duplicatesArray, $formatedCompletedAC);
                        }
                        elseif(in_array($checkRestartDuplicateFormat, $restartArray)) {
                            //Finding index of the duplicate access code
                            $duplicateAcIndex = array_search($checkRestartDuplicateFormat, $restartArray);
                            //$restartArray = array_slice($restartArray, $duplicateAcIndex, 1);
                            unset($restartArray[$duplicateAcIndex]);
                            array_push($duplicatesArray, $formatedCompletedAC);
                            array_push($completedArray, $formatedCompletedAC);
                        }
                        else{
                            array_push($completedArray, $formatedCompletedAC);
                        }
                        //End checking for duplicates access codes -- completed        
                }
            elseif (str_ends_with($isCompletedOrRestartCheck, 'r')) {
                $tempRestart = substr($allWhiteSpaceRemoved, 0, 16);
                $allWhiteSpaceRemoved = substr($allWhiteSpaceRemoved, 16);
                //Format completed ac
                $part1 = substr($tempRestart, 0, 3);
                $part2 = substr($tempRestart, 3, 3);
                $part3 = substr($tempRestart, 6, 3);
                $part4 = substr($tempRestart, 9, 7);
                $part1 = '('.$part1.'-';
                $part2 = $part2.'-';
                $part3 = $part3.'-';
                $part4 = $part4.') ';
                $formatedRestartAC = $part1.$part2.$part3.$part4;
                $checkCompletedDuplicateFormat = $part1.$part2.$part3.'completed';
    
                //Checking for duplicates access codes --restart
                 if(in_array($checkCompletedDuplicateFormat, $completedArray) || in_array($formatedRestartAC, $restartArray)) {
                    array_push($duplicatesArray, $formatedRestartAC);
                }
                else{
                    array_push($restartArray, $formatedRestartAC);
                }
                //End checking for duplicates access codes --restart
            }
            else {
                $tempRestart = substr($allWhiteSpaceRemoved, 0, 16);
                $allWhiteSpaceRemoved = substr($allWhiteSpaceRemoved, 16);
                //Format Restart ac
                $part1 = substr($tempRestart, 0, 3);
                $part2 = substr($tempRestart, 3, 3);
                $part3 = substr($tempRestart, 6, 3);
                $part4 = substr($tempRestart, 9, 7);
                $part1 = '('.$part1.'-';
                $part2 = $part2.'-';
                $part3 = $part3.'-';
                $part4 = $part4.'restart) ';
                $formatedRestartAC = $part1.$part2.$part3.$part4;
                $checkCompletedDuplicateFormat = $part1.$part2.$part3.'completed';
    
                //Checking for duplicates access codes --restart
                 if(in_array($checkCompletedDuplicateFormat, $completedArray) || in_array($formatedRestartAC, $restartArray)) {
                    array_push($duplicatesArray, $formatedRestartAC);
                }
                else{
                    array_push($restartArray, $formatedRestartAC);
                }
                //End checking for duplicates access codes --restart
            }
        }
        $counter = new Counter;
        $counter->completedAc = $completedArray;
        $counter->restartedAc = $restartArray;
        $counter->user_id = $request->id;
        $counter->save();

        //return new CounterResource($counter);
        return response()->json([
            'acs' => $counter
        ]);
       /// return new CounterResource($counter);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ac = Counter::findOrFail($id);

        return response()->json($ac);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wordToremove = array("Review", "of", "has", "Do", "you", "want", "to", "dismiss", "this", "Session", "been", "set", "-", "?", ".", "x");
        $stringWordRemoved = str_replace($wordToremove,"",$request->acs);
        $trimWordRemoved = trim($stringWordRemoved);
        $nameRemoved = preg_replace("/\(([^()]*+|(?R))*\)/","", $trimWordRemoved);
        $allWhiteSpaceRemoved = preg_replace('/\s+/', '',  $nameRemoved);
        $completedArray = array();
        $restartArray = array();
        $duplicatesArray = array();

        //loop on completed
        $tempCompleted = null;
        $tempRestart = null;

        while (strlen($allWhiteSpaceRemoved) >= 1) {
            $isCompletedOrRestartCheck = substr($allWhiteSpaceRemoved, 0, 10);
            if (str_ends_with($isCompletedOrRestartCheck, 'c')) {
                        $tempCompleted = substr($allWhiteSpaceRemoved, 0, 18);
                        $allWhiteSpaceRemoved = substr($allWhiteSpaceRemoved, 18);
                        //Format completed ac
                        $part1 = substr($tempCompleted, 0, 3);
                        $part2 = substr($tempCompleted, 3, 3);
                        $part3 = substr($tempCompleted, 6, 3);
                        $part4 = substr($tempCompleted, 9, 9);
                        $part1 = '('.$part1.'-';
                        $part2 = $part2.'-';
                        $part3 = $part3.'-';
                        $part4 = $part4.') ';
                        $formatedCompletedAC = $part1.$part2.$part3.$part4;
                        $checkRestartDuplicateFormat = $part1.$part2.$part3.'restart) ';
                        
                        //Checking for duplicates access codes -- completed
                        if(in_array($formatedCompletedAC, $completedArray)) {
                            array_push($duplicatesArray, $formatedCompletedAC);
                        }
                        elseif(in_array($checkRestartDuplicateFormat, $restartArray)) {
                            //Finding index of the duplicate access code
                            $duplicateAcIndex = array_search($checkRestartDuplicateFormat, $restartArray);
                            //$restartArray = array_slice($restartArray, $duplicateAcIndex, 1);
                            unset($restartArray[$duplicateAcIndex]);
                            array_push($duplicatesArray, $formatedCompletedAC);
                            array_push($completedArray, $formatedCompletedAC);
                        }
                        else{
                            array_push($completedArray, $formatedCompletedAC);
                        }
                        //End checking for duplicates access codes -- completed        
                }
            elseif (str_ends_with($isCompletedOrRestartCheck, 'r')) {
                $tempRestart = substr($allWhiteSpaceRemoved, 0, 16);
                $allWhiteSpaceRemoved = substr($allWhiteSpaceRemoved, 16);
                //Format completed ac
                $part1 = substr($tempRestart, 0, 3);
                $part2 = substr($tempRestart, 3, 3);
                $part3 = substr($tempRestart, 6, 3);
                $part4 = substr($tempRestart, 9, 7);
                $part1 = '('.$part1.'-';
                $part2 = $part2.'-';
                $part3 = $part3.'-';
                $part4 = $part4.') ';
                $formatedRestartAC = $part1.$part2.$part3.$part4;
                $checkCompletedDuplicateFormat = $part1.$part2.$part3.'completed';

                //Checking for duplicates access codes --restart
                 if(in_array($checkCompletedDuplicateFormat, $completedArray) || in_array($formatedRestartAC, $restartArray)) {
                    array_push($duplicatesArray, $formatedRestartAC);
                }
                else{
                    array_push($restartArray, $formatedRestartAC);
                }
                //End checking for duplicates access codes --restart
            }
            else {
                $tempRestart = substr($allWhiteSpaceRemoved, 0, 16);
                $allWhiteSpaceRemoved = substr($allWhiteSpaceRemoved, 16);
                //Format Restart ac
                $part1 = substr($tempRestart, 0, 3);
                $part2 = substr($tempRestart, 3, 3);
                $part3 = substr($tempRestart, 6, 3);
                $part4 = substr($tempRestart, 9, 7);
                $part1 = '('.$part1.'-';
                $part2 = $part2.'-';
                $part3 = $part3.'-';
                $part4 = $part4.'restart) ';
                $formatedRestartAC = $part1.$part2.$part3.$part4;
                $checkCompletedDuplicateFormat = $part1.$part2.$part3.'completed';

                //Checking for duplicates access codes --restart
                 if(in_array($checkCompletedDuplicateFormat, $completedArray) || in_array($formatedRestartAC, $restartArray)) {
                    array_push($duplicatesArray, $formatedRestartAC);
                }
                else{
                    array_push($restartArray, $formatedRestartAC);
                }
                //End checking for duplicates access codes --restart
            }
        }
        $counter = Counter::findOrFail($id);

        $mergeCompleted = array_unique(array_merge($completedArray, $counter->completedAc));
        $mergeRestart = array_unique(array_merge($restartArray, $counter->restartedAc));
        
        $counter->update(['completedAc'=>$mergeCompleted]);
        $counter->update(['restartedAc'=>$mergeRestart]);
        
        return response()->json($counter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
