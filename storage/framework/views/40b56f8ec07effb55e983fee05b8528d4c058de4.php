


<?php echo $__env->yieldContent('content'); ?>


<script>
  // Initialiser le menu déroulant Bootstrap
  var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
  var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
    return new bootstrap.Dropdown(dropdownToggleEl)
  });
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/base_ana.blade.php ENDPATH**/ ?>