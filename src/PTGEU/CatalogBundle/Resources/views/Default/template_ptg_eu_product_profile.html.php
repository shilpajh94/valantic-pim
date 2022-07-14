<?php
if (!isset($this->parentContainer)) {
    $this->extend('PTGEUCatalogBundle:Layouts:layout.html.php');
}
?>

<?php if($this->editmode): ?>
        <?= $this->relation("ptg_eu_product_profile_page", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["PTGEUCatalogCategory"],
        ]);
        ?>
<?php endif; ?>

<?php if($profileData){ ?>
	<div class="wrapper">
		<div class="footer mt-4" >
			<p>
				<?= $this->textarea("PTGEU_disclaimer_$profileKey"); ?>
			</p>
			<hr/>
			<div class="flex mt-4">

				<?php
					if($this->editmode){
						?>
							<span class="mr-4">
								<?php
							echo $this->image("PTGEU_Barcode_$profileKey",["width" => 100, "height" => 100]);
							?>
							</span>
							<?php
					}else{
							$imgSrcObj1 = $this->image("PTGEU_Barcode_$profileKey");

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
						echo $this->wysiwyg("PTGEU_ContactInfo_$profileKey", ["width" => 400, "height" => 100]);
					}
					else
					{
						echo $this->wysiwyg("PTGEU_ContactInfo_$profileKey");
					}
				?>
				
			</div>
		</div>

		<?php foreach ($profileData as $profile => $groupData) { ?>
			
			<?php 
				$profileKey = md5($groupData['brandName'].$profile);
			?>
			<div class="top-section">
				<?php
				if($this->editmode){

					?>

					<div class="attr-font">
						<div class="attr-font">Attribute Name = Product Logo</div>
					</div>

					<?php
					if(!$this->image("PTGEU_Product_Logo_$profileKey")->isEmpty())
					{
						echo $this->image("PTGEU_Product_Logo_$profileKey");
					}
					else
					{
						echo $this->image("PTGEU_Product_Logo_$profileKey")->setImage($groupData['productLogo']);
					}
				}
				else
				{
					$imgSrcObj1 = $this->image("PTGEU_Product_Logo_$profileKey");

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
							?>

							<div class="attr-font">
								<div class="attr-font">Attribute Name = Main Image</div>
							</div>

							<?php
							if(!$this->image("PTGEU_Product_MainImage_$profileKey")->isEmpty())
							{
									echo $this->image("PTGEU_Product_MainImage_$profileKey");
							}
							else
							{
									echo $this->image("PTGEU_Product_MainImage_$profileKey")->setImage($groupData['mainImageObj']);
							}
									
					}else{
							$imgSrcObj1 = $this->image("PTGEU_Product_MainImage_$profileKey");

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
							?>

							<div class="attr-font">
								<div class="attr-font">Attribute Name = Technical Image</div>
							</div>

							<?php
							if(!$this->image("PTGEU_Product_TechnicalImage_$profileKey")->isEmpty())
							{
									echo $this->image("PTGEU_Product_TechnicalImage_$profileKey");
							}
							else
							{
									echo $this->image("PTGEU_Product_TechnicalImage_$profileKey")->setImage($groupData['technicalImageObj']);
							}
									
					}else{
							$imgSrcObj1 = $this->image("PTGEU_Product_TechnicalImage_$profileKey");

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
									if(!$this->input("PTG_Footer_BrandName_$profileKey")->isEmpty())
									{
											echo $this->input("PTG_Footer_BrandName_$profileKey");
									}
									else
									{
											echo $this->input("PTG_Footer_BrandName_$profileKey")->setDataFromResource($groupData['brandName']);
									}
											
							}else{
									echo $this->input("PTG_Footer_BrandName_$profileKey");
							}
							?>
						</h1>
						<h4><?= $this->translate('PTGEU_Technical_Data'); ?></h4>

						<table class="table1" cellspacing="5" cellpadding ="5">

							<?php if($groupData['profile']){ ?>
							<tr>
								<th><?= $this->translate('PTGEU_Profile'); ?></th>
								<td></td>
								<td><?= $groupData['profile']; ?></td>
							</tr>
							<?php } ?>

							<?php if($groupData['beltDesign']){ ?>
							<tr>
								<th><?= $this->translate('PTGEU_Belt_design'); ?></th>
								<td></td>
								<td>
									<?php
										$beltDesignCombine = [];
										foreach ($groupData['beltDesign'] as $key => $value) {
											$key = $this->translate($key);
											$beltDesignCombine[] = "$key: $value";
										}
										echo implode('<br/>', $beltDesignCombine);
									?>
								</td>
							</tr>
							<?php } ?>

							<?php if($groupData['upperRibWidth']){ ?>
							<tr>
								<th><?= $this->translate('PTGEU_Upper_rib_width'); ?></th>
								<td>[<?= $this->translate('PTGEU_unit_mm'); ?>]</td>
								<td><?= $groupData['upperRibWidth']; ?></td>
							</tr>
							<?php } ?>

							<?php if($groupData['beltHeight']){ ?>
							<tr>
								<th><?= $this->translate('PTGEU_Belt_height'); ?></th>
								<td>[<?= $this->translate('PTGEU_unit_mm'); ?>]</td>
								<td><?= $groupData['beltHeight']; ?></td>
							</tr>
							<?php } ?>

							<?php if($groupData['flankAngle']){ ?>
							<tr>
								<th><?= $this->translate('PTGEU_Flank_angle'); ?></th>
								<td>[<?= $this->translate('PTGEU_unit_degree'); ?>]</td>
								<td><?= $groupData['flankAngle']; ?></td>
							</tr>
							<?php } ?>

							<?php if($groupData['hardness']){ ?>
							<tr>
								<th><?= $this->translate('PTGEU_Hardness'); ?></th>
								<td>[<?= $this->translate('PTGEU_unit_hardness_shore_a'); ?>]</td>
								<td><?= $groupData['hardness']; ?></td>
							</tr>
							<?php } ?>

							<?php if($groupData['weightPerMLength']){ ?>
							<tr>
								<th><?= $this->translate('PTGEU_Weight_per_m_length'); ?></th>
								<td>[<?= $this->translate('PTGEU_unit_kg_per_m'); ?>]</td>
								<td><?= $groupData['weightPerMLength']; ?></td>
							</tr>
							<?php } ?>

							<?php if($groupData['minDiameter']){ ?>
							<tr>
								<th><?= $this->translate('PTGEU_Min_diameter'); ?></th>
								<td>[<?= $this->translate('PTGEU_unit_mm'); ?>]</td>
								<td><?= $groupData['minDiameter']; ?></td>
							</tr>
							<?php } ?>

							<?php if($groupData['minBlackIdlerDiameter']){ ?>
							<tr>
								<th><?= $this->translate('PTGEU_Min_black_idler_diameter'); ?></th>
								<td>[<?= $this->translate('PTGEU_unit_mm'); ?>]</td>
								<td><?= $groupData['minBlackIdlerDiameter']; ?></td>
							</tr>
							<?php } ?>

							<?php if($groupData['properties']){ ?>
							<tr>
								<th><?= $this->translate('PTGEU_Properties'); ?></th>
								<td></td>
								<td>
									<?php
										$propertiesCombine = [];
										foreach ($groupData['properties'] as $key => $value) {
											$key = $this->translate($key);
											$propertiesCombine[] = "$key $value";
										}
										echo implode('<br/>', $propertiesCombine);
									?>
								</td>
							</tr>
							<?php } ?>

							<?php if($groupData['nominalLength']){ ?>
							<tr>
								<th ><?= $this->translate('PTGEU_Nominal_length'); ?></th>
								
								<td colspan="2">
									<table cellspacing="5" cellpadding ="5">
										<tr>
											<th></th>
											<th><?= $this->translate('PTGEU_Datum_length'); ?></th>
											<th><?= $this->translate('PTGEU_Length_tolerance'); ?></th>
											<th><?= $this->translate('PTGEU_Set_tolerance'); ?></th>
										</tr>

										<?php foreach ($groupData['nominalLength'] as $key => $value) { ?>
										<tr>
											<td>[<?= $this->translate('PTGEU_unit_mm'); ?>]</td>
											<td><?= $value['datumLength']; ?></td>
											<td><?= $value['lengthTolerance']; ?></td>
											<td><?= $value['setTolerance']; ?></td>
										</tr>
										<?php } ?>
									</table>
								</td>
							</tr>
							<?php } ?>
						</table>

						<h4 class="mt-4"><?= $this->input("Schematic_belt_marking_and_production_code_$profileKey",['placeholder'=>'Schematic belt marking and production code']); ?></h4>
						<div class="highlight">

						<?php if($groupData['product_qr_code_src']){ ?>
						<span><img src="<?= $groupData['branding_logo_src']; ?>" width="100"  alt="branding image"></span>
						<?php } ?>

						<span><?= $groupData['brandName']; ?></span>
						<span>3000.00</span>
						<span>LD</span>
						<span>Made in <br/>XXX</span>
						<span>antispoc <br/> ISO</span>
						<span>04-07-2022</span>
						<span>6</span>

						<?php if($groupData['product_qr_code_src']){ ?>
						<span><img src="<?= $groupData['product_qr_code_src']; ?>" style="width:30px;"  alt="product qr code"></span>
						<?php } ?>

						</div>
					</section>
				</div>
			</div>
		<?php } ?>	
	</div>
<?php } ?>