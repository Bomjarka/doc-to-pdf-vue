<?php

namespace App\Http\Controllers;

use Bomjarka\WordToPdfConverter\Services\DocumentService;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DocumentController extends Controller
{
    /**
     * @throws CopyFileException
     * @throws CreateTemporaryFileException
     */
    public function getVars(Request $request, DocumentService $documentService)
    {
        $file = $request->file('file');
        if ($file) {
            $documentService->saveDocument($file);

            return $documentService->getVariables($file->getClientOriginalName());
        }
    }

    /**
     * @param Request $request
     * @param DocumentService $documentService
     * @return BinaryFileResponse|void
     * @throws CopyFileException
     * @throws CreateTemporaryFileException
     */
    public function convert(Request $request, DocumentService $documentService)
    {
        $template = json_decode($request->get('template'));
        $fileName = $request->get('fileName');

        if ($fileName && $documentService->fileExists($fileName)) {
            $documentService->changeTemplate($fileName, $template);

            return response()->download($documentService->convert($fileName))->deleteFileAfterSend();
        }
    }
}
