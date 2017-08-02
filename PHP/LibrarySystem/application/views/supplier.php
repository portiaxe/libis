<?php
  // var_dump($suppList);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>

      <script>
      var isSelected = false;

      $(function () {
        $('.edit').click(function() {
            var id= $(this).attr('id');
            var name= $('#input').val();
            $.post(
                   "SupplierController/editSupplier",
                   {
                    id: id,
                    name: name
                    },
                    function(data,success){
                        alert("EDIT SUCCESS");
                        location.reload();
                    }
                   );
        });

        $('.delete').click(function() {
            var id= $(this).attr('id');
            $.post(
                   "SupplierController/deleteSupplier",
                   {
                    id: id,
                    },
                    function(data,success){
                      alert("DELETE SUCCESS");
                        location.reload();
                    }
            );
        });


        $('.toggle').on('click', function(){
          if(!isSelected){
            $(this).html('<input type="text" data-id="' + $(this).data('id') + '" class="bagong" value="' + $(this).html() + '">');
            isSelected = true;
            $('.bagong').focus();
          }
        });

        $('body').on('keyup', '.bagong', function(e) {
            if(e.which == 13) {
                //alert($(this).data('id') + $(this).val());
                $.post(
                   "SupplierController/editSupplier",
                   {
                      id: $(this).data('id'),
                      name: $(this).val()
                    },
                    function(data,success){
                        //alert("EDIT SUCCESS");
                        location.reload();
                    }
              );
            }
        });
      })

      </script>

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="SupplierController/addSupplier" method="post">
        <input type="text" name="supplierName" id="input" value="">
        <input type="submit" name="" value="Add">
    </form>

    <table border="50">
      <tr>
        <td>Supplier id</td>
        <td>Supplier Name</td>
        <td>Actions</td>
      </tr>

        <?php foreach ($suppList AS $SupplierList) {
          ?>
          <tr>
            <td><?php echo $SupplierList->supplierid; ?></td>
            <td class='toggle' data-id='<?php echo $SupplierList->supplierid; ?>'><?php echo $SupplierList->suppliername; ?></td>
            <td>
              <input type="button" class="delete" value="Delete" id="<?php echo $SupplierList->supplierid; ?>"
            </td>

          </tr>
          <?php
        }
        ?>
    </table>
  </body>
</html>
