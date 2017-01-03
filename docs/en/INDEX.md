#PDF Upload Field

Usage is as follows:

```php
<?php
    PDFUploadField::create("MyFile", "Upload a PDF");
```

Options
---
You can set the PDF folder as the fourth parameter, like this:

```php
<?php
    PDFUploadField::create("MyFile", "Upload a PDF", null, "my-folder");
```
Or you can set it in the yml configs:

```yml
PDFUploadField:
  pdf_folder_name: 'pdf-folder-number-two'
```
