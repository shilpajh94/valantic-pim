<?php 

return [
    "enableInDefaultView" => TRUE,
    "displayfield-1565-inputEl" => "Enables Web2Print documents in default documents view in default perspective. Either activate this or create custom views and perspectives for managing Web2Print documents.",
    "generalTool" => "pdfreactor",
    "generalDocumentSaveMode" => "default",
    "displayfield-1568-inputEl" => "Document Save Mode = cleanup deletes all not used document elements for current document. This might be necessary for useage reports in print documents.",
    "pdfreactorVersion" => "8.0",
    "pdfreactorProtocol" => "http",
    "pdfreactorServer" => "localhost",
    "pdfreactorServerPort" => "9423",
    "pdfreactorBaseUrl" => "http://192.168.9.42:8001/admin/",
    "displayfield-1550-inputEl" => "BaseURL for PDFreactor. This is prefixed to each relative url in print templates when creating PDFs.",
    "pdfreactorApiKey" => "",
    "displayfield-1552-inputEl" => "If the PDFreactor instance is set up to require API keys, you can enter it here.",
    "pdfreactorLicence" => "",
    "pdfreactorEnableLenientHttpsMode" => FALSE,
    "displayfield-1555-inputEl" => "Enable this option if PDFreactor fails to connect successfully via HTTPS",
    "pdfreactorEnableDebugMode" => FALSE,
    "wkhtmltopdfBin" => "xvfb-run -a -s \"-screen 0 640x480x16\" /usr/bin/wkhtmltopdf",
    "wkhtml2pdfOptions" => [
        "print-media-type" => "",
        "page-size" => "A4"
    ],
    "displayfield-1560-inputEl" => "One per line with '--' and whitespace between key and value (e.g. --key value)",
    "wkhtml2pdfHostname" => "http://demo.pimcore.org"
];
