<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @package    RestApiBundle
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace IFSEU\RestApiBundle\RestTrait;

trait LanguageCode
{
    /**
     * @var array language code mapping of client with CONTI-TECH
     */
    private $codeMapping = [
        "pl_PL" => "pl",
        "sr_RS" => "sr",
        "en_EX" => "en",
        "nl_BE" => "nl_BE",
        "tr_TR" => "tr",
        "de_DE" => "de_DE",
        "cs_CZ" => "cs",
        "ru_RU" => "ru",
        "ro_RO" => "ro",
        "en_GR" => "en",
        "en_US" => "en",
        "de_CH" => "de_CH",
        "fi_FI" => "fi",
        "en_AU" => "en",
        "fr_FR" => "fr",
        "en_GB" => "en_GB",
        "de_AT" => "de_AT",
        "it_IT" => "it",
        "hu_HU" => "hu",
        "pt_PT" => "pt",
        "sv_SE" => "sv",
        "es_ES" => "es",
        "en_TWO" => "en",
        "si_EAS" => "en",
        "sk_SK" => "sk",
        "en_MY" => "en",
        "en_PL" => "en",
        "cn_CN" => "en",
        "ru_BG" => "ru",
        "hr_EAS" => "hr",
        "fr_CH" => "fr_CH",
        "da_DK" => "da",
        "es_EC" => "es",
        "hr_HR" => "hr",
        "sl_SI" => "en",
        "en_AP" => "en",
        "bg_BG" => "bg",
        "de_HR" => "de",
        "de_SI" => "de",
        "en_DE" => "en",
        "en_IE" => "en",
        "en_UK" => "en",
        "fr_BE" => "fr_BE",
        "no_NO" => "en",
        "ru_EAS" => "ru",
        "se_SE" => "en",
        "de_BIC" => "de",
        "en_AL" => "en",
        "en_BG" => "en",
        "hr_BA" => "hr",
        "en_KS" => "en",
        "en_MK" => "en",
        "sr_MK" => "sr",
        "sr_ME" => "sr",
        "zh_CN" => "zh",
        "fr_CA" => "fr",
        "de_VG" => "de",
        "es_XX" => "es",
        "ko_KR" => "ko",
        "en_IN" => "en",
        "fr_BIC" => "fr",
        "en_TH" => "en",
        "es_AR" => "es",
        "de_BE" => "de",
        "en_BR" => "en",
        "es_BR" => "es",
        "es_MX" => "es",
        "pt_BR" => "pt",
        "en_CA" => "en",
        "en_ZA" => "en",
        "en_BIC" => "en",
        "ja_JP" => "ja",
        "cn_MY" => "en",
        "zh_TW" => "zh",
        "xx_XX" => "en",
        "it_CH" => "it_CH",
        "es_CL" => "es",
        "es_CO" => "es",
        "th_TH" => "en",
        "en_CN" => "en",
        "en_HU" => "en",
        "en_BL" => "en",
        "en_NO" => "en",
        "en_DK" => "en",
        "en_FI" => "en",
        "en_SE" => "en",

    ];

    private $defaultLocale = 'en';

    /**
     * Method to check language code validity
     *
     * @param $langCode
     *
     * @return bool
     *
     * @throws \Exception
     */
    private function getValidLanguageCode($langCode)
    {
        if (isset($this->codeMapping[$langCode])) {
            return $this->codeMapping[$langCode];
        } else {
            return $this->defaultLocale;
        }
    }
}
