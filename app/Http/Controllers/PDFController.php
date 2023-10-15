<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;



class PDFController extends Controller
{
    public function generatePDF()
    {

        $totalEmployee = Employee::all()->count();
        $employees = Employee::all();
        $totalSalary = 0;
        foreach ($employees as $employee){
            $strSalary = $employee->salary;
            $salary = (int)$strSalary;
            $totalSalary = $totalSalary + $salary;
        }
        $data = [
          "totalEmployee" => $totalEmployee,
          "totalSalary" => $totalSalary,
          "date" => date('m-d-y'),
        ];

        $pdf = Pdf::loadView('pdf.pdf', $data);
        return $pdf->download('Monthly-report.pdf');
    }
}
