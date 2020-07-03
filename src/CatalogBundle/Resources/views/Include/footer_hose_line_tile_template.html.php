<div class="footer">
    <footer class="flex">
        <?php if (!$featuresFooter) { ?>
            <span class="logo">
                <b>
                    <?php
                    if ($this->input("footerTitle")->isEmpty()) {
                        echo $this->input("footerTitle")->setDataFromResource($footerTitle);
                    } else {
                        echo $this->input("footerTitle");
                    }
                    ?>
                </b>
                <?php
                if ($this->image('footerLogo')->isEmpty() && isset($footerLogo) && !empty($footerLogo)) {
                    echo $this->image('logo', [
                        "width" => 172,
                        "height" => 'auto',
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ])->setImage($footerLogo);
                } else {
                    echo $this->image('footerLogo', [
                        "width" => 172,
                        "height" => 'auto',
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ]);
                }
                ?>
            </span>
            <div class="flex aligned small">
                <h4>
                    <?php
                    if ($this->input('footerContent')->isEmpty() && isset($footerContent) && !empty($footerContent)) {
                        echo $this->input('footerContent', ['width' => 826, 'height' => 34])->setDataFromResource($footerContent);
                    } else {
                        echo $this->input('footerContent', ['width' => 826, 'height' => 34]);
                    }

                    ?>
                </h4>
            </div>
        <?php 
        } else { 
            $brandIds = array_keys($brandsInfo);
            $k = $brandPickupIndex;
            $featureIcons = array();
            if(is_array($brandsInfo) && !empty($brandsInfo)) {
                $i = 0;
                foreach($brandsInfo as $row) {
                    if($i<$k) {
                        continue;
                    }
                    if(isset($row['featureIcon'])) {
                        foreach($row['featureIcon'] as $featureId => $featureIcon) {
                            if(!array_key_exists($featureId, $featureIcons)) {
                                $featureIcons[$featureId] = $featureIcon;
                            }
                        }
                    }
                    
                }
            }
        ?>
            <div class="flex">
                <hr />
                <?php
                    if(is_array($featureIcons) && !empty($featureIcons)) {
                        foreach($featureIcons as $id=>$icon) {
                            
?>
<figure>
                    <?php
                    echo $this->image('productLogo' . $id, [
                        "width" => $icon['icon']->getWidth(),
                        "height" => $icon['icon']->getHeight(),
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ])->setImage($icon['icon']);
                    ?>
                    <figcaption><?php echo $icon['name']?></figcaption>
                </figure>
<?php
                        }
                    }
                ?>
            </div>
        <?php } ?>
    </footer>
</div>