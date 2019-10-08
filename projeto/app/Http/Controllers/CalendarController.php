<?php

namespace App\Http\Controllers;

use App\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

        $data = array();

        $query = "SELECT * FROM events ORDER BY id";

        $statement = $connect->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        foreach($result as $row)
        {
            $data[] = array(
            'id'   => $row["id"],
            'title'   => $row["title"],
            'start'   => $row["start_event"],
            'end'   => $row["end_event"]
            );
        }

        echo json_encode($data);
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
        $connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

        if(isset($_POST["title"]))
        {
            $query = "
                INSERT INTO events 
                (title, start_event, end_event) 
                VALUES (:title, :start_event, :end_event)
                ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                ':title'  => $_POST['title'],
                ':start_event' => $_POST['start'],
                ':end_event' => $_POST['end']
                )
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendar $calendar)
    {
        $connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

        if(isset($_POST["id"]))
        {
            $query = "
                UPDATE events 
                SET title=:title, start_event=:start_event, end_event=:end_event 
                WHERE id=:id
                ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                ':title'  => $_POST['title'],
                ':start_event' => $_POST['start'],
                ':end_event' => $_POST['end'],
                ':id'   => $_POST['id']
                )
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        if(isset($_POST["id"]))
        {
            $connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
            $query = "
                DELETE from events WHERE id=:id
                ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                ':id' => $_POST['id']
                )
            );
        }
    }
}
