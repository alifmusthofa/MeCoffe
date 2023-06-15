<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\File;
use CodeIgniter\Helpers\filesystem_helper;
use Faker\Extension\Helper;
use SebastianBergmann\CodeCoverage\Util\Filesystem;


class FileController extends Controller
{
    public function deleteFile()
    {
        helper('file');

        $file = '/path/to/file.txt';
        $ignore_exceptions = true;
        $success = delete_files($file, $ignore_exceptions);

        if ($success) {
            echo 'File deleted successfully.';
        } else {
            echo 'Failed to delete file.';
        }
    }
}