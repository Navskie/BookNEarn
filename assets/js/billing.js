var startDate = new Date(startDates);
            var endDate = new Date(endDates);

            // Calculate the difference in milliseconds
            var timeDifference = Math.abs(endDate.getTime() - startDate.getTime());

            // Convert milliseconds to days
            var daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));

            const price = "<?php echo $price ?>";
            const total = price * daysDifference;

            $('#prices').html("₱" + price);
            $('#numberOfDays').html(" x " + daysDifference + " nights");
            $('#total').html("₱" + total.toFixed(2));
            // console.log(total);