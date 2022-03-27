<html>

<head>
    <script src="https://credimax.gateway.mastercard.com/checkout/version/52/checkout.js" data-error="errorCallback" data-cancel="cancelCallback">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        function errorCallback(error) {
            console.log(JSON.stringify(error));
        }

        function timeoutCallback() {
            alert('Payment fail due to timeout');
            $.ajax({
                url: "<?php echo base_url('payment/update'); ?>",
                type: "POST",
                data: {
                    id: <?php echo $transaction_id; ?>,
                    status: 4
                },
                beforeSend: function() {

                },
                success: function(result) {
                    window.location.href = "<?php echo site_url('candidate-package'); ?>";
                },
                error: function(result) {
                    window.location.href = "<?php echo site_url('candidate-package'); ?>";
                }
            });
        }


        function completeCallback(msg) {
            alert('Payment successfull');
            $.ajax({
                url: "<?php echo base_url('payment/update'); ?>",
                type: "POST",
                data: {
                    id: <?php echo $transaction_id; ?>,
                    status: 3,
                    response: msg
                },
                beforeSend: function() {

                },
                success: function(result) {
                    window.location.href = "<?php echo site_url('candidate-package'); ?>";
                },
                error: function(result) {
                    window.location.href = "<?php echo site_url('candidate-package'); ?>";
                }
            });
        }

        function cancelCallback() {
            alert('Payment cancelled by user');
            $.ajax({
                url: "<?php echo base_url('payment/update'); ?>",
                type: "POST",
                data: {
                    id: <?php echo $transaction_id; ?>,
                    status: 2
                },
                beforeSend: function() {

                },
                success: function(result) {
                    window.location.href = "<?php echo site_url('candidate-package'); ?>";
                },
                error: function(result) {
                    window.location.href = "<?php echo site_url('candidate-package'); ?>";
                }
            });

        }

        Checkout.configure({
            merchant: '<?php echo MERCHANT_ID; ?>',
            order: {
                amount: '0.006',
                currency: 'BHD',
                description: '<?php echo $payment[1]['package_name']; ?>',
                id: '<?php echo $transaction_id; ?>',
            },
            interaction: {
                operation: 'AUTHORIZE', // set this field to 'PURCHASE' for Hosted Checkout to perform a Pay Operation.
                merchant: {
                    name: 'FALCON MULTI SERVICES LIMITED',
                    address: {
                        line1: '',
                        line2: ''
                    }

                }
            },
            session: {
                id: "<?php echo $pg_session; ?>"
            }
        });
    </script>
</head>

<body>


    <input type="button" value="Pay with Payment Page" onclick="Checkout.showPaymentPage();" />
    <a href="<?php echo site_url('candidate-package'); ?>">Cancel Payment</a>
</body>

</html>