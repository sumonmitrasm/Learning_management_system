<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <!-- Meta data -->
      <meta charset="UTF-8">
      <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
      <meta content="Blood Donation Camp" name="description">
      <meta content="PATHWAY" name="author">
      <meta name="keywords" content="admin, admin template, dashboard, admin dashboard, bootstrap 5, responsive, clean, ui, admin panel, ui kit, responsive admin, application, bootstrap 4, flat, bootstrap5, admin dashboard template" />
      <!-- Title -->
      <title>Blood Donation Camp</title>
      <!--Favicon -->
      <link rel="icon" href="{{ asset('admin/assets/images/brand/favicon.ico') }}" type="image/x-icon" />
      <!-- Bootstrap css -->
      <link id="style" href="{{ url('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
      <!-- Style css -->
      <link href="{{ url('admin/assets/css/style.css') }}" rel="stylesheet" />
      <!-- Plugin css -->
      <link href="{{ url('admin/assets/css/plugin.css') }}" rel="stylesheet" />
      <!-- Animate css -->
      <link href="{{ url('admin/assets/css/animated.css') }}" rel="stylesheet" />
      <!---Icons css-->
      <link href="{{ url('admin/assets/plugins/web-fonts/icons.css') }}" rel="stylesheet" />
      <link href="{{ url('admin/assets/plugins/web-fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ url('admin/assets/plugins/web-fonts/plugin.css') }}" rel="stylesheet" />
      <!--token generate -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   </head>
   <body class="main-body app sidebar-mini light-mode ltr">
      <!---Global-loader-->
      <div id="global-loader">
         <img src="{{ url('admin/assets/images/svgs/loader.svg') }}" alt="loader">
      </div>
      <div class="page">
         <div class="page-main">
            <!--app header-->
            @include('admin.layout.header')
            <!--/app header-->
            <!-- main-sidebar -->
            @include('admin.layout.sidebar')
            <!-- main-sidebar -->
            <!-- app-content start-->
            @yield('content')
            <!-- app-content end-->
         </div>
         <!--Footer-->
         @include('admin.layout.footer')
         <!-- End Footer-->
      </div>
      <!-- Back to top -->
      <a href="#top" id="back-to-top">
         <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
            <path d="M0 0h24v24H0V0z" fill="none"/>
            <path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/>
         </svg>
      </a>
      <!-- Jquery js-->
      <script src="{{ url('admin/assets/js/vendors/jquery.min.js') }}"></script>
      <!-- Bootstrap5 js-->
      <script src="{{ url('admin/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <!--Othercharts js-->
      <script src="{{ url('admin/assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>
      <!-- Circle-progress js-->
      <script src="{{ url('admin/assets/js/vendors/circle-progress.min.js') }}"></script>
      <!-- Jquery-rating js-->
      <script src="{{ url('admin/assets/plugins/rating/jquery.rating-stars.js') }}"></script>
      <!-- P-scroll js-->
      <script src="{{ url('admin/assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
      <!--Sidemenu js-->
      <script src="{{ url('admin/assets/plugins/sidemenu/sidemenu.js') }}"></script>
      <!-- Sticky js -->
      <script src="{{ url('admin/assets/js/sticky.js') }}"></script>
      <!-- ECharts js -->
      <script src="{{ url('admin/assets/plugins/echarts/echarts.js') }}"></script>
      <!-- Peitychart js-->
      <script src="{{ url('admin/assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/peitychart/peitychart.init.js') }}"></script>
      <!-- Apexchart js-->
      <script src="{{ url('admin/assets/js/apexcharts.js') }}"></script>
      <!--Moment js-->
      <script src="{{ url('admin/assets/plugins/moment/moment.js') }}"></script>
      <!-- Daterangepicker js-->
      <script src="{{ url('admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
      <script src="{{ url('admin/assets/js/daterange.js') }}"></script>
      <!---jvectormap js-->
      <script src="{{ url('admin/assets/plugins/jvectormap/jquery.vmap.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/jvectormap/jquery.vmap.world.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/jvectormap/jquery.vmap.sampledata.js') }}"></script>
      <!-- Data tables js-->
      <script src="{{ url('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/js/jszip.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
      <script src="{{ url('admin/assets/js/datatables.js') }}"></script>
      <!-- Select2 js -->
      <script src="{{ url('admin/assets/plugins/select2/select2.full.min.js') }}"></script>
      <script src="{{ url('admin/assets/js/select2.js') }}"></script>
      <!--Counters -->
      <script src="{{ url('admin/assets/plugins/counters/counterup.min.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/counters/waypoints.min.js') }}"></script>
      <!--Chart js -->
      <script src="{{ url('admin/assets/plugins/chart/chart.bundle.js') }}"></script>
      <script src="{{ url('admin/assets/plugins/chart/utils.js') }}"></script>
      <!-- Index js-->
      <script src="{{ url('admin/assets/js/index1.js') }}"></script>
      <!-- Color Theme js -->
      <script src="{{ url('admin/assets/js/themeColors.js') }}"></script>
      <!-- Switcher-Styles js -->
      <script src="{{ url('admin/assets/js/switcher-styles.js') }}"></script>
      <!-- Custom js-->
      <script src="{{ url('admin/assets/js/custom.js') }}"></script>

      <!--blood custom.js/admin.js-->
      <script src="{{ url('admin/assets/js/admin.js') }}"></script>
      <!--sweetallert2-->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <!--custom text editor by sumon mitra ------------------------------------------------------------------->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>
<!--
   Uncomment to load the Spanish translation
   <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/translations/es.js"></script>
   -->
<!-- start Custom Editor By Sumon Mitra -->
<script>
   // This sample still does not showcase all CKEditor&nbsp;5 features (!)
   // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
   CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
       // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
       toolbar: {
           items: [
               'exportPDF','exportWord', '|',
               'findAndReplace', 'selectAll', '|',
               'heading', '|',
               'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
               'bulletedList', 'numberedList', 'todoList', '|',
               'outdent', 'indent', '|',
               'undo', 'redo',
               '-',
               'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
               'alignment', '|',
               'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
               'specialCharacters', 'horizontalLine', 'pageBreak', '|',
               'textPartLanguage', '|',
               'sourceEditing'
           ],
           shouldNotGroupWhenFull: true
       },
       // Changing the language of the interface requires loading the language file using the <script> tag.
       // language: 'es',
       list: {
           properties: {
               styles: true,
               startIndex: true,
               reversed: true
           }
       },
       // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
       heading: {
           options: [
               { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
               { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
               { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
               { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
               { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
               { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
               { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
           ]
       },
       // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
       placeholder: 'Enter Description Hare!',
       // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
       fontFamily: {
           options: [
               'default',
               'Arial, Helvetica, sans-serif',
               'Courier New, Courier, monospace',
               'Georgia, serif',
               'Lucida Sans Unicode, Lucida Grande, sans-serif',
               'Tahoma, Geneva, sans-serif',
               'Times New Roman, Times, serif',
               'Trebuchet MS, Helvetica, sans-serif',
               'Verdana, Geneva, sans-serif'
           ],
           supportAllValues: true
       },
       // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
       fontSize: {
           options: [ 10, 12, 14, 'default', 18, 20, 22 ],
           supportAllValues: true
       },
       // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
       // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
       htmlSupport: {
           allow: [
               {
                   name: /.*/,
                   attributes: true,
                   classes: true,
                   styles: true
               }
           ]
       },
       // Be careful with enabling previews
       // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
       htmlEmbed: {
           showPreviews: true
       },
       // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
       link: {
           decorators: {
               addTargetToExternalLinks: true,
               defaultProtocol: 'https://',
               toggleDownloadable: {
                   mode: 'manual',
                   label: 'Downloadable',
                   attributes: {
                       download: 'file'
                   }
               }
           }
       },
       // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
       mention: {
           feeds: [
               {
                   marker: '@',
                   feed: [
                       '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                       '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                       '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                       '@sugar', '@sweet', '@topping', '@wafer'
                   ],
                   minimumCharacters: 1
               }
           ]
       },
       // The "super-build" contains more premium features that require additional configuration, disable them below.
       // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
       removePlugins: [
           // These two are commercial, but you can try them out without registering to a trial.
           // 'ExportPdf',
           // 'ExportWord',
           'CKBox',
           'CKFinder',
           'EasyImage',
           // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
           // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
           // Storing images as Base64 is usually a very bad idea.
           // Replace it on production website with other solutions:
           // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
           // 'Base64UploadAdapter',
           'RealTimeCollaborativeComments',
           'RealTimeCollaborativeTrackChanges',
           'RealTimeCollaborativeRevisionHistory',
           'PresenceList',
           'Comments',
           'TrackChanges',
           'TrackChangesData',
           'RevisionHistory',
           'Pagination',
           'WProofreader',
           // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
           // from a local file system (file://) - load this site via HTTP server if you enable MathType.
           'MathType',
           // The following features are part of the Productivity Pack and require additional license.
           'SlashCommand',
           'Template',
           'DocumentOutline',
           'FormatPainter',
           'TableOfContents',
           'PasteFromOfficeEnhanced'
       ]
   });
</script>
   </body>
</html>