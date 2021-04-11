<?php

namespace Sunnysideup\PdfUpload\Forms;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Folder;
use SilverStripe\Core\Config\Config;
use SilverStripe\ORM\SS_List;

/**
 * allow a pdf to be uploaded...
 *
 * Usage:
 *     $field = PDFUploadField::create(
 *         "ReportField",
 *         "Title",
 *         null,
 *         "folder-name"
 *     );
 */
class PDFUploadField extends UploadField
{
    private static $pdf_folder_name = 'pdfs';

    /**
     * @param string  $name
     * @param string  $title
     * @param SS_List $items If no items are defined, the field will try to auto-detect an existing relation on
     *
     *                       @see $record}, with the same name as the field name.
     *
     * @param string $folderName
     *
     */
    public function __construct(
        $name,
        $title,
        SS_List $items = null,
        $folderName = ''
    ) {
        parent::__construct(
            $name,
            $title,
            $items
        );
        $this->setDescription('Only PDF files are accepted.');
        //create folder
        if ('' === $folderName) {
            $folderName = Config::inst()->get(PDFUploadField::class, 'pdf_folder_name');
        }

        Folder::find_or_make($folderName);
        //set folder
        $this->setFolderName($folderName);
        $this->setAllowedExtensions(['pdf']);
        $this->setAllowedMaxFileNumber(1);
    }
}
