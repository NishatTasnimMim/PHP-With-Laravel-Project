<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'image'];

    protected static $student, $imageName, $imageUrl, $imageDirectory, $imageObject;

    public static function createS($request)
    {
        self::$imageObject = $request->file('image');
        self::$imageName = time().self::$imageObject->getClientOriginalName();
        self::$imageDirectory = 'assets/images/students/';
        self::$imageObject->move(self::$imageDirectory, self::$imageName);
        self::$imageUrl = self::$imageDirectory.self::$imageName;

        self::$student          = new Student();
        self::$student->name    = $request->name;
        self::$student->email   = $request->email;
        self::$student->phone  = $request->phone;
        self::$student->image  = self::$imageUrl;
        self::$student->save();

//        Student::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'phone' => $request->phone,
//            'image' => $request->image,
//        ]);

//        Student::create($request->except('_token'));
    }

    public static function updateS($request, $id)
    {
        self::$student          = Student::find($id);

        self::$imageObject = $request->file('image');
        if (self::$imageObject)
        {
            if (file_exists(self::$student->image))
            {
                unlink(self::$student->image);
            }
            self::$imageName = time().self::$imageObject->getClientOriginalName();
            self::$imageDirectory = 'assets/images/students/';
            self::$imageObject->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }
        else{
            self::$imageUrl = self::$student->image;
        }

        self::$student->name    = $request->name;
        self::$student->email   = $request->email;
        self::$student->phone   = $request->phone;
        self::$student->image   = self::$imageUrl;
        self::$student->save();
    }
}
