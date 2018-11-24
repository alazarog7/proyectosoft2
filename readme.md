<p align="center"><img src="https://www.anh.gob.bo/InsideFiles/Noticias/Files/173-1312031613.jpg"></p>


## Sistema de Gestion de Cuentas Privilegiada
Before install barryvdh/laravel-snappy package. we have must be required some dependencies for it. we have required two dependencies, run following command for install dependencies

Note : If you have 32-bit system then install this dependencies

- (Para un sistema de 32 bits)$composer require h4cc/wkhtmltopdf-i386 0.12.x
- (Para un sistema de 32 bits)$composer require h4cc/wkhtmltoimage-i386 0.12.x
- (Para un sistema de 64 bits)$composer require h4cc/wkhtmltopdf-amd64 0.12.x
- (Para un sistema de 64 bits)$composer require h4cc/wkhtmltoimage-amd64 0.12.x

After install both are dependencies then let's move on install our required package for generate HTML to PDF. just run following command for install.

- composer require barryvdh/laravel-snappy

In app/config.php

'providers' => [
	....
	Barryvdh\Snappy\ServiceProvider::class,
],
'aliases' => [
	....
	'PDF' => Barryvdh\Snappy\Facades\SnappyPdf::class,
	'SnappyImage' => Barryvdh\Snappy\Facades\SnappyImage::class,
],

Then after publish vendor folder run by this command


- php artisan vendor:publish --provider="Barryvdh\Snappy\ServiceProvider"

After install package, configure and publish it vendor then we have required some most important changes. if you don't change it is and forgot then you got following error message when you try to generate HTML to PDF. so, it must be required for all.


The exit status code '127' says something went wrong:
stderr: "sh: 1: /usr/local/bin/wkhtmltopdf: not found

You all are remember we have also install two dependancy for it. ones you check in your vendor folder then you found this path vendor/h4cc/wkhtmltoimage-amd64/bin/wkhtmltoimage-amd64 and another is vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64 so, we have required copy wkhtmltoimage-amd64 and wkhtmltopdf-amd64 folder in this path /usr/local/bin/ simply run following command for it.

Note : After copy both folder then give 777 permission


- cp vendor/h4cc/wkhtmltoimage-amd64/bin/wkhtmltoimage-amd64 /usr/local/bin/
- cp vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64 /usr/local/bin/


Now open your config/snappy.php file and changes in it bith of 'binary' array key following way


return array(
    'pdf' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltopdf-amd64',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltoimage-amd64',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
);


After done configuration then create one route in your routes/web.php file


- Route::get('generate-pdf', 'PdfGenerateController@pdfview')->name('generate-pdf');



namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;

class PdfGenerateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $users = DB::table("users")->get();
        view()->share('users',$users);

        if($request->has('download')) {
        	// pass view file
            $pdf = PDF::loadView('pdfview');
            // download pdf
            return $pdf->download('userlist.pdf');
        }
        return view('pdfview');
    }
}


Now we are create one simple blade file in resources/views/pdfview.blade.php file and here we are make very simple html layout for generate pdf file.

<!DOCTYPE html>
<html>
<head>
	<title>User list - PDF</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a>
	<table class="table table-bordered">
		<thead>
			<th>Name</th>
			<th>Email</th>
		</thead>
		<tbody>
			@foreach ($users as $key => $value)
			<tr>
				<td>{{ $value->name }}</td>
				<td>{{ $value->email }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>



Finally, execute: 
- php artisan serve