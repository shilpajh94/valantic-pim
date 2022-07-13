<?php
if (!isset($this->parentContainer)) {
    $this->extend('PTGEUCatalogBundle:Layouts:layout.html.php');
}
?>

<?php if($this->editmode): ?>
        <?= $this->relation("ptg_eu_product_page", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["PTGEUCatalogCategory"],
        ]);
        ?>
<?php endif; ?>

<div class="wrapper">
	
		<div class="top-section">
				<?php
				if($this->editmode){
					if(!$this->image("PTGEU_Product_Logo")->isEmpty())
					{
						echo $this->image("PTGEU_Product_Logo");
					}
					else
					{
						echo $this->image("PTGEU_Product_Logo")->setImage($groupData['productLogo']);
					}
				}
				else
				{
					$imgSrcObj1 = $this->image("PTGEU_Product_Logo");

					if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth))
					{
					?>
						<div class="logo">
						<img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?> " alt="logo"/>
						</div>
					<?php
					}
				}
				?>
			
			<div class="img-wrapper">
				<div class="set1">
				<?php
				if($this->editmode){
						if(!$this->image("PTGEU_Product_MainImage")->isEmpty())
						{
								echo $this->image("PTGEU_Product_MainImage");
						}
						else
						{
								echo $this->image("PTGEU_Product_MainImage")->setImage($groupData['mainImageObj']);
						}
								
				}else{
						$imgSrcObj1 = $this->image("PTGEU_Product_MainImage");

						if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth))
						{
						?>
						<img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?> " alt="logo"/>
						<?php
						}
				}
				?>
				</div>
				<div class="set1">
				<?php
				if($this->editmode){
						if(!$this->image("PTGEU_Product_TechnicalImage")->isEmpty())
						{
								echo $this->image("PTGEU_Product_TechnicalImage");
						}
						else
						{
								echo $this->image("PTGEU_Product_TechnicalImage")->setImage($groupData['technicalImageObj']);
						}
								
				}else{
						$imgSrcObj1 = $this->image("PTGEU_Product_TechnicalImage");

						if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth))
						{
						?>
						<img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?> " alt="technical image"/>
						<?php
						}
				}
				?>
				</div>
				<section class="">
					<h1 class="heading">
					<?php
						if($this->editmode){
								if(!$this->input("PTG_Footer_BrandName")->isEmpty())
								{
										echo $this->input("PTG_Footer_BrandName");
								}
								else
								{
										echo $this->input("PTG_Footer_BrandName")->setDataFromResource($groupData['brandName']);
								}
										
						}else{
								echo $this->input("PTG_Footer_BrandName");
						}
						?>
					</h1>
					<h4><?= $this->translate('Technical_Data'); ?></h4>

					<table class="table1" cellspacing="5" cellpadding ="5">
						<tr>
							<th>Profile</th>
							<td></td>
							<td>asdsa</td>
						</tr>
						<tr>
							<th>Design</th>
							<td></td>
							<td>Lorem ipsum</td>
						</tr>
						<tr>
							<th>Width</th>
							<td>[mm]</td>
							<td>=12.87</td>
						</tr>
						<tr>
							<th>Properties</th>
							<td></td>
							<td>lorem ipsum <br/> lopredj <br/>sdaksdjka</td>
						</tr>
						<tr>
							<th >nominal Length</th>
							
							<td colspan="2">
								<table cellspacing="5" cellpadding ="5">
									<tr>
										<th></th>
										<th>Length</th>
										<th>Tolerance</th>
										<th>Set Tolereance</th>
									</tr>
									<tr>
										<td>[mm]</td>
										<td>19000 + 89999</td>
										<td>+2</td>
										<td>sad</td>
									</tr>
									<tr>
										<td>[mm]</td>
										<td>19000 + 89999</td>
										<td>+2</td>
										<td>sad</td>
									</tr>
									<tr>
										<td>[mm]</td>
										<td>19000 + 89999</td>
										<td>+2</td>
										<td>sad</td>
									</tr>
									<tr>
										<td>[mm]</td>
										<td>19000 + 89999</td>
										<td>+2</td>
										<td>sad</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>

					<h4 class="mt-4"><?= $this->translate('Schematic_belt_marking_and_production_code'); ?></h4>
					<div class="highlight">
					<span>
						<img src="<?= $branding_logo_src; ?>" width="100"  alt="branding image">
					</span>
					<span><?= $groupData['brandName']; ?></span>
					<span>3000.00</span>
					<span>LD</span>
					<span>Made in <br/>XXX</span>
					<span>antispoc <br/> ISO</span>
					<span>04-07-2022</span>
					<span>6</span>
					<span><img src="/static/ptgeu/images/4-1.jpg" /></span>
					</div>
				</section>
			</div>
		</div>
		
	<div class="footer mt-4" >
			<p>
				<?= $this->textarea("PTGEU_disclaimer"); ?>
			</p>
			<hr/>
			<div class="flex mt-4">

				<?php
					if($this->editmode){
						?>
							<span class="mr-4">
								<?php
							echo $this->image("PTGEU_Barcode",["width" => 100, "height" => 100]);
							?>
							</span>
							<?php
					}else{
							$imgSrcObj1 = $this->image("PTGEU_Barcode");

							if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth))
							{
							?>
							<span class="mr-4">
							<img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?> " alt="PTG Barcode Image"/>
							</span>
							<?php
							}
					} 
				?>

				<?php
					if($this->editmode)
					{
						echo $this->wysiwyg("PTGEU_ContactInfo", ["width" => 400, "height" => 100]);
					}
					else
					{
						echo $this->wysiwyg("PTGEU_ContactInfo");
					}
				?>
				
				
			</div>
			
	</div>
</div>