  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.update-qty').click(function () {
            var button = $(this);
            var form = button.closest('form');
            var action = button.data('action');
            var itemId = form.data('id');
            var productId = form.find('input[name="product_id"]').val();
            $.ajax({
                url: '/cart/' + itemId,
                method: 'PUT',
                data: {
                    _token: form.find('input[name="_token"]').val(),
                    product_id: productId,
                    action: action
                },
                success: function (response) {
                    if (response.success) {
                      //update quantity
                        form.find('.quantity-display').text(response.quantity);
                        //update item total
                        $('.item-total[data-id="' + itemId + '"]').text(response.itemTotal);
                        //update grand total
                        $('#grand-total').text(response.grandTotal);
                    }
                },
                error: function () {
                    alert('Error updating quantity.');
                }
            });
        });
    });
</script>
