<script src="<?php echo e(asset('public/backEnd/multiselect/')); ?>/js/jquery.multiselect.js"></script>
<script type="text/javascript">
     $(function () {
            $("select[multiple].active.multypol_check_select").multiselect({
                columns: 1,
                placeholder: "Select",
                search: true,
                searchOptions: {
                    default: "Select",
                },
                
                selectAll: true,
            });
        });
</script><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/partials/multi_select_js_without_push.blade.php ENDPATH**/ ?>