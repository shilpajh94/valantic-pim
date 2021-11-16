<div class="environment-quality-sec">
    <div class="media">
            <?php   
                $image_position = 'right';
                if($this->editmode):
                    ?><div style="width:100%; display:block"><?php
                        ?><h3>Select Image Position</h3><?php
                    echo $this->select("image_position", [
                            "store" => [
                                ['left', 'Left'],
                                ['right', 'Right']
                            ],
                            "default" => "unlimited"
                        ]);
                    ?></div><?php
                endif;
                
                if($this->select("image_position")->getData())
                {
                    $image_position = $this->select("image_position")->getData();
                }

                if($image_position == 'left')
                {   
                    if(!$this->editmode && ($this->image("Image")->getThumbnail('catalog_thumb') || $this->image("Environment_Image")->getThumbnail('catalog_thumb')))
                    {
                        ?><div class="media-image-sec mr-4 ml-0"><?php
                    }
                        
                    if($this->editmode)
                    {
                        echo $this->image("Environment_Image");
                    }
                    else
                    {
                        $imgSrcObj =  $this->image("Environment_Image");
                        if($imgSrcObj->getThumbnail('catalog_thumb'))
                        {
                            ?>
                                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images"
                            style="max-height:350px" />
                            <?php
                        }
                    }

                    if($this->editmode)
                    {
                        echo $this->image("Image");
                    }
                    else
                    {
                        $imgSrcObj =  $this->image("Image");
                        if($imgSrcObj->getThumbnail('catalog_thumb'))
                        {   
                            ?>
                                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images"
                            style="max-height:350px" />
                            <?php
                        }
                    }
                    ?></div><?php
                }
            ?>
        

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
            <div class="p-medium">
                <?= $this->wysiwyg("Quality_Content",["placeholder" =>"Enter Your  Description"]); ?>
            </div>

        </div>
        <?php
            if($image_position == 'right')
            {   
                ?>
                
                <?php
                    
                    if(!$this->editmode && ($this->image("Image")->getThumbnail('catalog_thumb') || $this->image("Environment_Image")->getThumbnail('catalog_thumb')))
                    {
                        ?>
                            <div class="media-image-sec">
                        <?php
                    }

                    if($this->editmode)
                    {
                        echo $this->image("Environment_Image");
                    }
                    else
                    {
                        $imgSrcObj1 =  $this->image("Environment_Image");

                        
                        if($imgSrcObj1->getThumbnail('catalog_thumb'))
                        {
                            ?>
                                <img src="<?= $imgSrcObj1->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images"
                            style="max-height:350px" />
                            <?php
                        }
                    }

                    if($this->editmode)
                    {
                        echo $this->image("Image");
                    }
                    else
                    {
                        $imgSrcObj =  $this->image("Image");

                        if($imgSrcObj->getThumbnail('catalog_thumb'))
                        {   
                            ?>
                                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images"
                            style="max-height:350px" />
                            <?php
                        }
                    }
                    if(!$this->editmode && ($this->image("Image")->getThumbnail('catalog_thumb') || $this->image("Environment_Image")->getThumbnail('catalog_thumb')))
                    {
                        ?></div><?php
                    }
            }
        ?>
        
    </div>
</div>