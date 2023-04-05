// db 
INSERT INTO `search_table` (`id`, `value`, `prop1`, `prop2`) VALUES  
(NULL, 'val1', 'prop1', 'prop1'),
(NULL, 'val2', 'prop2', 'prop2'),
(NULL, 'val3', 'prop3', 'prop3'),
(NULL, 'val4', 'prop4', 'prop4'),
(NULL, 'val5', 'prop5', 'prop5'),
(NULL, 'val6', 'prop6', 'prop6'),
(NULL, 'val7', 'prop7', 'prop7'),
(NULL, 'val8', 'prop8', 'prop8'),
(NULL, 'val9', 'prop9', 'prop9'),
(NULL, 'val0', 'prop0', 'prop0'),
(NULL, 'val10', 'prop10', 'prop10'),
(NULL, 'val11', 'prop11', 'prop11'),
(NULL, 'val12', 'prop12', 'prop12'),
(NULL, 'val13', 'prop13', 'prop13'),
(NULL, 'val14', 'prop14', 'prop14'),
(NULL, 'val15', 'prop15', 'prop15'),
(NULL, 'val16', 'prop16', 'prop16'),
(NULL, 'val17', 'prop17', 'prop17'),
(NULL, 'val18', 'prop18', 'prop18'),
(NULL, 'val19', 'prop19', 'prop19'),
(NULL, 'val20', 'prop20', 'prop20'), 
(NULL, 'val21', 'prop21', 'prop21'),
(NULL, 'val22', 'prop22', 'prop22'),
(NULL, 'val23', 'prop23', 'prop23'),
(NULL, 'val24', 'prop24', 'prop24'), 
(NULL, 'val25', 'prop25', 'prop25'), 
(NULL, 'val26', 'prop26', 'prop26'), 
(NULL, 'val27', 'prop27', 'prop27')


//ajax.php


<?
if (isset($_GET['queryItem'])) {
    $searchItem = $_GET['queryItem'];
    $db = JFactory::getDbo();
    $db->setQuery("SELECT * FROM search_table where value =  $searchItem");
    $RES = $db->loadRowList(); 
    PRINT_R(json_encode($RES)); 
}
?>



// index.php

 <div class="grid-child container-component">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <form>
                <input type="text" name="queryItem">
                <input type="submit" value="search">
            </form>
            <div class="modalWrapper">
                <div class="modalBody">
                    <div class="item-Id"></div>
                    <div class="search-val"></div>
                    <div class="first-prop"></div>
                    <div class="second-prop"></div>
                </div>
            </div>
            <script>
                window.onload = function() {
                    $("form").on("submit", function(event) {
                        event.preventDefault();
                        let data = $(this).serialize()
                        $.ajax({
                            url: '/templates/cassiopeia/ajax.php',
                            data: data,
                            success: function(data) {
                                let newData = JSON.parse(data)[0]
                                if (newData.length > 0) {
                                    $('.item-Id').text(newData[0])
                                    $('.search-val').text(newData[1])
                                    $('.first-prop').text(newData[2])
                                    $('.second-prop').text(newData[3])
                                    $('.modalWrapper').show()
                                } else {
                                    $('.item-Id').text('Such Item is not exist')
                                    $('.modalWrapper').show()
                                }
                            },
                            dataType: 'text',
                            error: function() {
                                console.log('Error')
                            }
                        });
                    })
                    $('.modalWrapper').on('click', function() {
                        $('.modalWrapper').hide()
                    })

                };
            </script>
        </div>











