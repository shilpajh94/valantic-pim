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
		<div class="footer3">
			<p>
				<?= $this->textarea("PTGEU_disclaimer_$profileKey"); ?>
			</p>
			<hr/>
			<div class="mt-10">

				<?php
					if($this->editmode){
						
						?>
							<span class="mr-4 display-float-left">
								<?php
							echo $this->image("PTGEU_Barcode_$profileKey",["width" => 50, "height" => 50]);
							?>
							</span>
							<?php
					}else{
							$imgSrcObj1 = $this->image("PTGEU_Barcode_$profileKey");

							if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth))
							{
							?>
							<span class="mr-4 display-float-left">
							<img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?> " style="width:50px;" alt="PTG Barcode Image"/>
							</span>
							<?php
							}
					} 
				?>
				<div class="display-flow-root">
				<?= $this->wysiwyg("PTGEU_ContactInfo_$profileKey"); ?>
				</div>
				
			</div>
		</div>

		<?php foreach ($profileData as $profile => $groupData) { ?>
			
			<?php 
				$profileKey = md5($groupData['brandName'].$profile);
			?>
			<div class="top-section page-break-before-always above edit-prev-mode-mt-50">
				<?php
				if($BrandLogoSrc){
					?>
						<div class="logo">
						<img src="<?= $BrandLogoSrc ?>" alt="logo"/>
						</div>
					<?php
				}
				?>
				
				<div class="img-wrapper position-relative">
					<div class="set1 bg-mask">
					<?php
					if($this->editmode){
							?>

							<div class="attr-font text-center">Attribute Name = Main Image</div>

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
					<div class="abs">
					<?php
					if($this->editmode){
							?>

							<div class="attr-font">Attribute Name = Technical Image</div>

							<?php
							if(!$this->image("PTGEU_Product_TechnicalImage_$profileKey")->isEmpty())
							{
									echo $this->image("PTGEU_Product_TechnicalImage_$profileKey");
							}
							else
							{
									echo $this->image("PTGEU_Product_TechnicalImage_$profileKey")->setImage($groupData['technicalDrawing1Obj']);
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
				</div>
				<section class="">
					<h4>
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
					</h4>

					<h6><?= $this->input("PTGEU_Technical_Data_$profileKey",['placeholder'=>'Technical Data']); ?></h4>

					<table class="table1" aria-describedby="outer">

						<?php if($groupData['profile']){ ?>
						<tr>
							<th scope="outer"><?= $this->translate('PTGEU_Profile'); ?></th>
							<td></td>
							<td><?= $groupData['profile']; ?></td>
						</tr>
						<?php } ?>

						<?php if($groupData['beltDesign']){ ?>
						<tr>
							<th scope="outer"><?= $this->translate('PTGEU_Belt_design'); ?></th>
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
							<th scope="outer"><?= $this->translate('PTGEU_Upper_rib_width'); ?></th>
							<td>[<?= $this->translate('PTGEU_unit_mm'); ?>]</td>
							<td><?= $groupData['upperRibWidth']; ?></td>
						</tr>
						<?php } ?>

						<?php if($groupData['beltHeight']){ ?>
						<tr>
							<th scope="outer"><?= $this->translate('PTGEU_Belt_height'); ?></th>
							<td>[<?= $this->translate('PTGEU_unit_mm'); ?>]</td>
							<td><?= $groupData['beltHeight']; ?></td>
						</tr>
						<?php } ?>

						<?php if($groupData['flankAngle']){ ?>
						<tr>
							<th scope="outer"><?= $this->translate('PTGEU_Flank_angle'); ?></th>
							<td>[<?= $this->translate('PTGEU_unit_degree'); ?>]</td>
							<td><?= $groupData['flankAngle']; ?></td>
						</tr>
						<?php } ?>

						<?php if($groupData['hardness']){ ?>
						<tr>
							<th scope="outer"><?= $this->translate('PTGEU_Hardness'); ?></th>
							<td>[<?= $this->translate('PTGEU_unit_hardness_shore_a'); ?>]</td>
							<td><?= $groupData['hardness']; ?></td>
						</tr>
						<?php } ?>

						<?php if($groupData['weightPerMLength']){ ?>
						<tr>
							<th scope="outer"><?= $this->translate('PTGEU_Weight_per_m_length'); ?></th>
							<td>[<?= $this->translate('PTGEU_unit_kg_per_m'); ?>]</td>
							<td><?= $groupData['weightPerMLength']; ?></td>
						</tr>
						<?php } ?>

						<?php if($groupData['minDiameter']){ ?>
						<tr>
							<th scope="outer"><?= $this->translate('PTGEU_Min_diameter'); ?></th>
							<td>[<?= $this->translate('PTGEU_unit_mm'); ?>]</td>
							<td><?= $groupData['minDiameter']; ?></td>
						</tr>
						<?php } ?>

						<?php if($groupData['minBlackIdlerDiameter']){ ?>
						<tr>
							<th scope="outer"><?= $this->translate('PTGEU_Min_black_idler_diameter'); ?></th>
							<td>[<?= $this->translate('PTGEU_unit_mm'); ?>]</td>
							<td><?= $groupData['minBlackIdlerDiameter']; ?></td>
						</tr>
						<?php } ?>

						<?php if($groupData['properties']){ ?>
						<tr>
							<th scope="outer"><?= $this->translate('PTGEU_Properties'); ?></th>
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

						<?php if($groupData['nominalLengthList']){ ?>
						<tr>
							<th scope="outer" ><?= $this->translate($groupData['nominalLength']); ?></th>
							
							<td class="noPadding">
								<table aria-describedby="inner1">
								<tr><th scope="inner1">&nbsp;</th></tr>
								<?php foreach ($groupData['nominalLengthList'] as $key => $value) { ?>
									<tr><td colspan="1">[<?= $this->translate('PTGEU_unit_mm'); ?>]</td></tr>
								<?php } ?>
								</table>
							</td>
							
							<td colspan="1" class="noPadding">
								<table aria-describedby="inner2">
									<tr>
										<th scope="inner2"><?= $this->translate($groupData['datumLengthColumn']); ?></th>
										<th scope="inner3"><?= $this->translate('PTGEU_Length_tolerance'); ?></th>
									</tr>

									<?php foreach ($groupData['nominalLengthList'] as $key => $value) { ?>
									<tr>
										<td><?= $value['datumLength']; ?></td>
										<td><?= $value['lengthTolerance']; ?></td>
									</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
						<?php } ?>
					</table>

					<h6 class="mt-4"><?= $this->input("Schematic_belt_marking_and_production_code_$profileKey",['placeholder'=>'Schematic belt marking and production code']); ?></h4>
					
					<div class="img-wrapper">
						<div class="branding-img">
						<?php
							if($this->editmode){
									?>

									<?php
										echo $this->image("PTGEU_Product_BrandingImage_$profileKey");
											
							}else{
									$imgSrcObj1 = $this->image("PTGEU_Product_BrandingImage_$profileKey");

									if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth))
									{
									?>
									<img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?> " alt="logo"/>
									<?php
									}
							}
							?>
						</div>
					</div>
				</section>
				
			</div>
			
		<?php } ?>	
	</div>
<?php } ?>

<style>
.footer3 p
{
  margin-bottom: 0.3rem;
}

.footer3{
    margin-left: 50px;
    margin-right: 50px;
    font-size: 10px;
    position: running(footer3);
}
@media print {
	.footer3{
		padding-bottom: 50px;
	}
}

@page {
    margin-left: 0;
    margin-right: 0;
    margin-top: 50px;
	margin-bottom: 150px;
}


@page:left {
    @top-left-corner{
        content: '';
    }
    @top-right{
        content: '';
    }
    @bottom-center {
        content: element(footer3);
        z-index: 1;
    }
}


@page:right {
    @top-right-corner{
        content: '';
    }

    @top-left{
		content: '';
    }
    @bottom-center {
        content: element(footer3);
        z-index: 1;
    }
}

</style>