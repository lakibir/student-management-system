    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('wallet::wallet.refund_request'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
    <style>
        table.dataTable tfoot th, table.dataTable tfoot td.walletTranscation{
            padding: 20px 10px 20px 30px !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('wallet::wallet.refund_request'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('wallet::wallet.wallet'); ?></a>
                <a href="#"><?php echo app('translator')->get('wallet::wallet.refund_request'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_st_admin_visitor mt-20">
    <div class="container-fluid p-0">
        <div class="white-box">
            <div class="row mt-40">
                <div class="col-lg-12">
                    <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <table id="table_id" class="table data-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('common.sl'); ?></th>
                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                    <th><?php echo app('translator')->get('wallet::wallet.method'); ?></th>
                                    <th><?php echo app('translator')->get('common.pending'); ?></th>
                                    <th><?php echo app('translator')->get('wallet::wallet.approve'); ?></th>
                                    <th><?php echo app('translator')->get('wallet::wallet.reject'); ?></th>
                                    <th><?php echo app('translator')->get('common.note'); ?></th>
                                    <th><?php echo app('translator')->get('common.status'); ?></th>
                                    <th><?php echo app('translator')->get('common.file'); ?></th>
                                    <th><?php echo app('translator')->get('wallet::wallet.create_date'); ?></th>
                                    <th><?php echo app('translator')->get('common.action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                           
                        </table>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    
    <div class="modal fade admin-query" id="approveRefundModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('wallet::wallet.approve_refund'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('wallet::wallet.are_you_sure_to_approve'); ?></h4>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <?php echo e(Form::open(['method' => 'POST','route' =>'wallet.approve-refund'])); ?>

                            <input type="hidden" name="id" value="">
                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('wallet::wallet.approve'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade admin-query" id="rejectRefundModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('wallet::wallet.reject_refund'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                            <h4><?php echo app('translator')->get('wallet::wallet.are_you_sure_to_reject'); ?></h4>
                        </div>
                    <?php echo e(Form::open(['route' => 'wallet.reject-refund', 'method' => 'POST'])); ?>

                            <input type="hidden" name="id" value="">
                        <div class="form-group">
                            <label><strong><?php echo app('translator')->get('wallet::wallet.reject_note'); ?></strong></label>
                            <textarea name="reject_note" class="form-control" rows="6"></textarea>
                        </div>
        
                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.close'); ?></button>
                            <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.submit'); ?></button>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade admin-query" id="refundNoteModal" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('wallet::wallet.view_bank_payment_reject_note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong><?php echo app('translator')->get('wallet::wallet.reject_note'); ?></strong></label>
                        <textarea readonly id="noteArea" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade admin-query" id="showFile">
        <div class="modal-dialog modal-dialog-centered large-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('wallet::wallet.view_file'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-0 mt-30">
                    <div class="container student-certificate">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <input type="hidden" name="fileId" value="">
                                <div class="mb-5">
                                    <img class="img-fluid"
                                        src="">
                                </div>
                                <br>
                                <div class="mb-5">
                                    <a href="" class="file" download>
                                        <?php echo app('translator')->get('common.download'); ?> 
                                        <span class="pl ti-download"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    $(document).ready(function() {
     
   $('.data-table').DataTable({
                 processing: true,
                 serverSide: true,
                 "ajax": $.fn.dataTable.pipeline( {
                       url: "<?php echo e(route('wallet.wallet-refund-request-ajax')); ?>",
                       data: { 
                           
                        },
                       pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                       
                   } ),
                   columns: [
                        {data: 'DT_RowIndex', name: 'id'},
                        {data: 'user_name.full_name', name: 'user_name.full_name'},
                        {data: 'payment_method', name: 'payment_method'},
                        {data: 'pending_refund', name: 'pending_refund'},
                        {data: 'approve_refund', name: 'approve_refund'},
                        {data: 'reject_refund', name: 'reject_refund'},
                        {data: 'refund_note', name: 'refund_note'},
                        {data: 't_status', name: 't_status'},
                        {data: 'file_view', name: 'file_view'},
                        {data: 'date', name: 'date'},
                        {data: 'action', name: 'action',orderable: false, searchable: true},
                    ],
                    bLengthChange: false,
                    bDestroy: true,
                    language: {
                        search: "<i class='ti-search'></i>",
                        searchPlaceholder: window.jsLang('quick_search'),
                        paginate: {
                            next: "<i class='ti-arrow-right'></i>",
                            previous: "<i class='ti-arrow-left'></i>",
                        },
                    },
                    dom: "Bfrtip",
                    buttons: [{
                        extend: "copyHtml5",
                        text: '<i class="fa fa-files-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('copy_table'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "excelHtml5",
                        text: '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: window.jsLang('export_to_excel'),
                        title: $("#logo_title").val(),
                        margin: [10, 10, 10, 0],
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "csvHtml5",
                        text: '<i class="fa fa-file-text-o"></i>',
                        titleAttr: window.jsLang('export_to_csv'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "pdfHtml5",
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('export_to_pdf'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                        orientation: "landscape",
                        pageSize: "A4",
                        margin: [0, 0, 0, 12],
                        alignment: "center",
                        header: true,
                        customize: function(doc) {
                            doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
                            doc.content.splice(1, 0, {
                                margin: [0, 0, 0, 12],
                                alignment: "center",
                                image: "data:image/png;base64," + $("#logo_img").val(),
                            });
                            doc.defaultStyle = {
                                font: 'DejaVuSans'
                            }
                        },
                    },
                    {
                        extend: "print",
                        text: '<i class="fa fa-print"></i>',
                        titleAttr: window.jsLang('print'),
                        title: $("#logo_title").val(),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "colvis",
                        text: '<i class="fa fa-columns"></i>',
                        postfixButtons: ["colvisRestore"],
                    },
                ],
                columnDefs: [{
                    visible: false,
                }, ],
                responsive: true,
            });
        } );

        function approveRefund(id){
            var modal = $('#approveRefundModal');
            modal.find('input[name=id]').val(id);
            modal.modal('show');
        }
        function refundNote(id){
            var modal = $('#refundNoteModal');
            var note = $('.note_'+ id).data('note');
            modal.find('textarea').val(note)
            modal.modal('show');
        }

        function fileView(id){
            var modal = $('#showFile');
            var file = $('.file_'+ id).data('file');
            modal.find('input[name=fileId]').val(id);
            modal.find('img[class=img-fluid]').attr("src", file);
            modal.find('a[class=file]').attr("href", file);
            modal.modal('show');
        }

        function rejectRefund(id){
            var modal = $('#rejectRefundModal');
            modal.find('input[name=id]').val(id);
            modal.modal('show');
        }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\Modules/Wallet\Resources/views/walletRefundRequest.blade.php ENDPATH**/ ?>