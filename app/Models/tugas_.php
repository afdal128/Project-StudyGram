<?php

namespace App\Models;

class tugas 
{
     private static $daftar = [
    
            ['id' => '1',
            'title' => 'bahasa inggris',
            'description' => 'Deskripsi tugas ',
            'status' => 'coming',
            'due_date' => '2024-01-01'],
       

       
            ['id' => '2',
            'title' => 'Tugas 2',
            'description' => 'Deskripsi tugas 2',
            'status' => 'in_process',
            'due_date' => '2024-02-01'],
      


            ['id' => '3',
            'title' => 'Tugas 3',
            'description' => 'Deskripsi tugas 3',
            'status' => 'completed',
            'due_date' => '2024-03-01'],
    

      
            ['id' => '4',
            'title' => 'Tugas 4',
            'description' => 'Deskripsi tugas 4',
            'status' => 'coming',
            'due_date' => '2024-04-01'],
       
       
           [ 'id' => '5',
            'title' => 'Tugas 5',
            'description' => 'Deskripsi tugas 5',
            'status' => 'in_process',
            'due_date' => '2024-05-01'],
    


            ['id' => '6',
            'title' => 'Tugas 6',
            'description' => 'Deskripsi tugas 6',
            'status' => 'completed',
            'due_date' => '2024-06-01'],
     
     ];
     public static function allTasks()
     {
         return self::$daftar;
     }
     public static function all($status)
     {
        return array_filter(self::$daftar, function ($task) use ($status) {
            return $task['status'] === $status;
        });
     }

     public static function getTaskById($id)
    {
        foreach (self::$daftar as $task) {
            if ($task['id'] == $id) {
                return $task;
            }
        }
        return null;
    }

    public static function getNotifications()
    {
        $notifications = [];
        foreach (self::$daftar as $notif) {
            $notifications[] = $notif['title'] . " akan dikumpulkan pada tanggal " . date('d F Y', strtotime($notif['due_date']));
        }
        return $notifications;
    }

}

