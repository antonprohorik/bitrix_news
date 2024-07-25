<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */

use Bitrix\Main\Localization\Loc;

$skuTemplate = array();
?>
<? if(!empty($arResult['ITEMS'])):

	if(is_array($arResult['SKU_PROPS']))
	{
		foreach ($arResult['SKU_PROPS'] as $itemId => $skuProps)
		{
			$skuTemplate[$itemId] = array();
			foreach ($skuProps as &$arProp)
			{
				ob_start();
				?>
				<table>
					<tbody>
					<? if($arProp['SHOW_MODE'] == 'TEXT'): ?>

					<tr>
						<td>
							<p style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
							color: #a8a8a8; font-size: 14px; margin:0 0 5px 3px;">
								<?= htmlspecialcharsex($arProp['NAME']); ?>
							</p>
							<table cellpadding="0" cellspacing="3">
								<tbody>
								<tr>
									<td>
									<? foreach($arProp['VALUES'] as $key => $arOneValue): ?>

										<?
										if(isset($arOneValue['ALLOCATION']))
											$border = 2;
										else
											$border = 1;
										?>
										<div style="display: inline-block; border: <?=$border?>px solid #5d9728;">
											<div style="border: none;" width="30" height="30" valign="middle" align="middle">
												<span><?= htmlspecialcharsex($arOneValue['NAME']); ?></span>
											</div>
										</div>
									<? endforeach ?>
									</td>
								</tr>
								</tbody>
							</table>
						</td>
					</tr>

					<tr><td height="15"></td></tr>

					<? elseif ($arProp['SHOW_MODE'] == 'PICT'): ?>

						<tr>
							<td>
								<p style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
						color: #a8a8a8; font-size: 14px; margin:0 0 5px;">
									<?= htmlspecialcharsex($arProp['NAME']); ?>
								</p>
								<table cellpadding="0" cellspacing="3">
									<tbody>
									<tr>
										<? foreach ($arProp['VALUES'] as $arOneValue): ?>

											<?
											if(isset($arOneValue['ALLOCATION']))
												$border = 3;
											else
												$border = 1;
											?>

											<td>
												<table cellpadding="0" cellspacing="0" bordercolor="#5d9728" border="<?=$border?>">
													<tbody>
													<tr>
														<td width="26" height="26" bgcolor="#000">
															<img src="<?=$arOneValue['PICT']['SRC']; ?>" width="26" height="26" style="border: none;">
														</td>
													</tr>
													</tbody>
												</table>
											</td>
										<? endforeach ?>
									</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr><td height="15"></td></tr>

					<? endif ?>
					</tbody>
				</table>
				<?
				$skuTemplate[$itemId][$arProp['CODE']] = ob_get_contents();
				ob_end_clean();
				unset($arProp);
			}
		}
	}
	?>

	<table width="" cellpadding="0" cellspacing="0">

		<tbody>
		<? foreach($arResult['ITEMS'] as $item): ?>

			<tr><td colspan="5" height="25"></td></tr>

			<tr>
				<td colspan="5">
					<a href="<?=$item['DETAIL_PAGE_URL']?>" style="font-size: 14px; font-family: 'Helvetica Neue',
				Helvetica, Arial, sans-serif; font-weight: bold; color: #000; text-decoration: none;">
						<?=$item['NAME']?>
					</a>
				</td>
			</tr>

			<tr><td colspan="5" height="15px;"></td></tr>

			<tr>
				<td>

					<table cellpadding="0" cellspacing="0" valign="top" style="display: inline-block">
						<tbody>
						<tr>
							<td width="170">
								<table height="170" border="1" bordercolor="#ebebeb" cellpadding="0" cellspacing="0">
									<tbody>
									<tr>
										<td width="168" height="168">
											<a href="<?=$item['DETAIL_PAGE_URL']?>">
												<img src="<?=$item['PREVIEW_PICTURE']['src']?>" style="display: block; margin: auto">
											</a>
										</td>
									</tr>
									</tbody>
								</table>
							</td>
							<td width="15"></td>
						</tr>
						<tr><td height="15"></td></tr>
						</tbody>
					</table>

					<? if(!empty($item['OFFERS']) && isset($skuTemplate[$item['ID']])): ?>

						<table cellpadding="0" cellspacing="0" style="display: inline-block" valig