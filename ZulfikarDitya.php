<?php

/**
 * Laravel Controller Helper
 * 
 * Readmore: https://github.com/zulfikar-ditya/laravel-api-controller-helper
 * @zulfikar-ditya
 */

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

trait ControllerHelper
{
    /**
     * response json 
     * 
     * @param array $arr
     * @param int $code
     * @return \Illuminate\Response\JsonResponse
     */
    public function ResponseJson(array $arr, int $code = 200)
    {
        return response()->json($arr, $code);
    }

    /**
     * response json while error validation
     * 
     * @param $error
     * @param int $code
     * @return \Illuminate\Response\JsonResponse
     */
    public function ResponseJsonValidate($error, int $code = 422)
    {
        return response()->json(compact('error'), $code);
    }

    /**
     * response data table
     * @param $data 
     * @param $count
     * @param $message
     * @param $code
     * @return \Illuminate\Response\JsonResponse
     */
    public function ResponseJsonDataTable($data, $count, $message = 'success get data', $code = 200)
    {
        return response()->json(compact('data', 'count', 'message'), $code);
    }

    /**
     * response json message only
     * 
     * @param string $message
     * @param int $code
     * @return \Illuminate\Response\JsonResponse
     */
    public function ResponseJsonMessage(string $message, int $code = 200)
    {
        return $this->ResponseJson(compact('message'), $code);
    }

    /**
     * response from mixed value
     * 
     * @param mixed $var
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function ResponseJsonMixed($var, $message = 'success get data', $code = 200)
    {
        return response()->json([
            'data' => $var,
            'message' => $message
        ], $code);
    }

    /**
     * response 404 not found
     * 
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function ResponseJsonNotFound($message = 'Data or Page Not Found.', $code = 404)
    {
        return response()->json(compact('message'), $code);
    }

    /**
     * response json data
     * 
     * @param $data
     * @param string $message
     * @param int $code 
     * @return \Illuminate\Http\JsonResponse
     */
    public function ResponseJsonData($data, $message = 'success get data', $code = 200)
    {
        return response()->json(compact('data', 'message'), $code);
    }

    /**
     * get or set message redirect
     * 
     * @param bool $succes
     * @param string $method
     * @param string $message
     * @param string $exception_message
     * @param int $code
     * @return \Illuminate\Response\JsonResponse
     */
    public function ResponseJsonMessageCRUD(bool $success = true, $method = 'create', $message = null, $exception_message = null, $code = 200, $data = null)
    {
        if ($success) {
            $final_message = 'Success ';
        } else {
            $final_message = 'Failed ';
        }

        if ($method == 'create') {
            $final_message .= 'insert new data. ';
        } else if ($method == 'edit') {
            $final_message .= 'update data. ';
        } else if ($method == 'delete') {
            $final_message .= 'delete data, ';
        }

        if ($message != null) {
            $final_message .= $message . ' ';
        }

        if ($exception_message != null) {
            $final_message .= $exception_message;
        }

        if ($data == null) {
            return response()->json(['message' => $final_message], $code);
        } else {
            return response()->json(['message' => $final_message, "result" => $data], $code);
        }
    }

    /**
     * response download
     * 
     * @param string $file
     * @return \Illuminate\Http\ResponseDownload
     */
    public function ResponseDownloadStorage(string $file)
    {
        return response()->download(storage_path('/app/public/' . $file));
    }

    public function ResponseDownload(string $file)
    {
        return response()->download($file);
    }

    /**
     * updload file 
     * 
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder = 'uknown'
     * @return string|bool
     */
    public function upload_file(\Illuminate\Http\UploadedFile $file, string $folder = 'uknown')
    {
        return Storage::disk('public')->put($folder, $file);
    }

    /**
     * delete file 
     * 
     * @apram string $file_path
     * @return bool
     */
    public function delete_file(string $file_path)
    {
        return Storage::disk('public')->delete($file_path);
    }

    /**
     * seacrh data by date
     * 
     * @param string $search
     * @return array
     */
    public function search_date($search)
    {
        // #================= search date ====================#
        $mounths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $search_date = explode(' ', $search);
        $search_mounth = 0;
        foreach ($mounths as $key => $mounth) {
            $index = $key + 1;
            if (str_contains(strtoupper($mounth), strtoupper($search_date[0]))) {
                // $search_mounth = $index;
                $search_mounth = (strlen($key) == 1) ? "0" . $index : $index;
                $search_date[0] = $index;
            } elseif (count($search_date) > 1 && str_contains(strtoupper($mounth), strtoupper($search_date[1]))) {
                $search_mounth = (strlen($key) == 1) ? "0" . $index : $index;
                $search_date[1] = (strlen($key) == 1) ? "0" . $index : $index;
            }
        }
        $search_date[0] = (strlen($search_date[0]) == 1) ? "0" . $search_date[0] : $search_date[0];
        krsort($search_date);
        // #================== end search date ====================#

        return ["month" => $search_mounth, "date" => $search_date];
    }

    /**
     * validate api
     * 
     * @param array $request
     * @param array $rules
     * @return \Illuminate\Http\JsonResponse | bool
     *
     */
    public function validate_api($request, $rules)
    {
        $validate = Validator::make($request, $rules);

        if ($validate->fails()) {
            return $this->ResponseJsonValidate($validate->errors());
        }

        return true;
    }

    /**
     * get or set message redirect
     * 
     * @param bool $succes
     * @param string $method
     * @param string $message
     * @param string $exception_message
     * @param int $code
     * @return \Illuminate\Response\Response
     */
    public function ResponseMessageCRUD(bool $success = true, $method = 'create', $message = null, $exception_message = null)
    {
        if ($success) {
            $final_message = 'Success ';
        } else {
            $final_message = 'Failed ';
        }

        if ($method == 'create') {
            $final_message .= 'insert new data. ';
        } else if ($method == 'edit') {
            $final_message .= 'update data. ';
        } else if ($method == 'delete') {
            $final_message .= 'delete data, ';
        }

        if ($message != null) {
            $final_message .= $message . ' ';
        }

        if ($exception_message != null) {
            $final_message .= $exception_message;
        }

        return $final_message;
    }
}
