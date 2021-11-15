<?php
        if($this->editmode):
            ?><h3>Select Heading Type</h3><?php
            echo $this->select("heading_type", [
                    "store" => [
                        ['h1', 'h1'],
                        ['h2', 'h2'],
                        ['h3', 'h3'],
                        ['h4', 'h4'],
                        ['h5', 'h5'],
                        ['h6', 'h6']
                    ]
                ]);
            ?><h3>Select Heading Color</h3><?php
            echo $this->select("heading_color", [
                "store" => [
                    ['#000000', 'Black'],
                    ['#ffa500', 'Yellow']
                ]
            ]);
        endif;
    ?>
    <?php
        $heading_type = 'h2';
        $heading_color = '#000000';
        if($this->select("heading_type")->getData())
        {
            $heading_type = $this->select("heading_type")->getData();
        }
        if($this->select("heading_color")->getData())
        {
            $heading_color = $this->select("heading_color")->getData();
        }
        echo "<$heading_type style='color:$heading_color'>"; 
        echo $this->input("Header_title",["placeholder" =>"Enter Your  Heading"]);
        echo "</$heading_type>"; 
    ?>