<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SpreadsheetReader;
use Illuminate\Support\Facades\File;


class CsvImportController extends Controller
{

    public function parse(Request $request) {

        $file = $request->file('csv_file');
        $request->validate([
            'csv_file' => 'mimes:csv,txt',
        ]);

        $path = $file->path();
        $hasHeader = $request->input('header', false) ? true : false;

        $reader = new SpreadsheetReader($path);
        $headers = $reader->current();
        $lines = [];
        $lines[] = $reader->next();
        $lines[] = $reader->next();


        $filename = str_random(10) . '.csv';
        $file->storeAs('csv_import', $filename);

        $modelName = $request->input('model', false);
        $fullModelName = "App\\" . $modelName;

        $model = new $fullModelName();
        $fillables = $model->getFillable();

        $redirect = url()->previous();

        return view('csvImport.parse_import', compact('headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect'));

    }

    public function process(Request $request) {

        $filename = $request->input('filename', false);
        $path = storage_path('app/csv_import/' . $filename);

        $hasHeader = $request->input('hasHeader', false);

        $fields = $request->input('fields', false);
        $fields = array_flip(array_filter($fields));

        $modelName = $request->input('modelName', false);
        $model = "App\\" . $modelName;

        $reader = new SpreadsheetReader($path);
        $insert = [];

        foreach($reader as $key => $row) {
            if ($hasHeader && $key == 0) {
                continue;
            }

            $tmp = [];
            foreach($fields as $header => $k) {
                $tmp[$header] = $row[$k];
            }
            $insert[] = $tmp;

        }

        $for_insert = array_chunk($insert, 100);

        foreach ($for_insert as $insert_item) {
            $model::insert($insert_item);
        }

        $rows = count($insert);
        $table = str_plural($modelName);

        File::delete($path);

        $redirect = $request->input('redirect', false);
        return redirect()->to($redirect)->with('message', trans('global.app_imported_rows_to_table', ['rows' => $rows, 'table' => $table]));

    }

}
