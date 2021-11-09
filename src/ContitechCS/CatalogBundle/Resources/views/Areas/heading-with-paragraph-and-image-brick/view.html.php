<div class="environment-quality-sec">
    <div class="media">

        <div>
        <?php
            $image_position = 'right';
            if($this->editmode):
                ?><h3>Select Image Position</h3><?php
                echo $this->select("image_position", [
                        "store" => [
                            ['left', 'Left'],
                            ['right', 'Right']
                        ],
                        "default" => "unlimited"
                    ]);
            endif;
            
            if($this->select("image_position")->getData())
            {
                $image_position = $this->select("image_position")->getData();
            }

            if($image_position == 'left')
            {
                if($this->editmode)
                {
                    echo $this->image("Environment_Image");
                }
                else
                {
                    $imgSrcObj =  $this->image("Environment_Image");
                    if($imgSrcObj)
                    {
                        ?>
                            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images mr-4 ml-0"
                        style="max-height:350px" />
                        <?php
                    }
                }
            }
        ?>
        <div>

        <div class="media-body">

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
                                ],
                                "default" => "unlimited"
                            ]);
                    endif;
                ?>

            <?php
                
                $heading_type = 'h3';
                if($this->select("heading_type")->getData())
                {
                    $heading_type = $this->select("heading_type")->getData();
                }

                echo "<$heading_type class='orange'>"; 
                echo $this->input("Header_title",["placeholder" =>"Enter Your  Heading"]);
                echo "</$heading_type>"; 
            
            ?>
            <div class="p-medium">
                <?= $this->wysiwyg("Quality_Content",["placeholder" =>"Enter Your  Description"]); ?>
            </div>

        </div>
        <?php
            if($image_position == 'right')
            {
                if($this->editmode)
                {
                    echo $this->image("Environment_Image");
                }
                else
                {
                    $imgSrcObj =  $this->image("Environment_Image");
                    if($imgSrcObj)
                    {
                        ?>
                            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images mr-0"
                        style="max-height:350px" />
                        <?php
                    }
                }
            }
        ?>
    </div>
</div>