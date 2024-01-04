# Reports.PHP

#### Stimulsoft Reports.PHP is a reporting tool designed to create, edit and view reports in the Internet using a client-server technology. The PHP script works on the server side and controls the report generation. The JavaScript report engine works on the client side and provides a universal mechanism for reports generation almost on any client. Fast and powerful report engine, rich and intuitive interface, deployment and licensing.

# Installation
The product is distributed using the [Composer](https://getcomposer.org/) repository. You can add the necessary libraries using the command:

```
composer require masroore/stimulsoft-php
```

# Usage
Add the minimum required namespaces to use to the page:
```php
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Stimulsoft\Enums\StiComponentType;
use Stimulsoft\Report\StiReport;
use Stimulsoft\StiHandler;
use Stimulsoft\StiJavaScript;
use Stimulsoft\Viewer\StiViewer;
use Stimulsoft\Viewer\StiViewerOptions;
?>
```

Render the necessary scripts in the `<head>` section
```php
<head>
<?php
    $helper = new StiJavaScript(StiComponentType::Viewer);
    $helper->renderHtml();
?>
</head>
```

Create and render a request handler in the `<script>` section of the page:
```php
<script>
<?php
    $handler = new StiHandler();
    $handler->renderHtml();
?>
</script>
```

Create and render the component in the `<script>` section of the page:
```php
<script>
<?php
    $viewer = new StiViewer();
    $report = new StiReport();
    $report->loadFile("reports/SimpleList.mrt");
    $viewer->report = $report;
    $viewer->renderHtml();
?>
</script>
```
