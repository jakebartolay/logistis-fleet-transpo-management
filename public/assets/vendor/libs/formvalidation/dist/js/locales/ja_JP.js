(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else {
		var a = factory();
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(self, function() {
return /******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/vendor/libs/formvalidation/dist/js/locales/ja_JP.js":
/*!******************************************************************************!*\
  !*** ./resources/assets/vendor/libs/formvalidation/dist/js/locales/ja_JP.js ***!
  \******************************************************************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
(function (global, factory) {
  ( false ? 0 : _typeof(exports)) === 'object' && "object" !== 'undefined' ? module.exports = factory() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
		__WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : (0);
})(this, function () {
  'use strict';

  /**
   * Japanese language package
   * Translated by @tsuyoshifujii
   */
  var ja_JP = {
    base64: {
      "default": '有効なBase64エンコードを入力してください'
    },
    between: {
      "default": '%sから%sの間で入力してください',
      notInclusive: '厳密に%sから%sの間で入力してください'
    },
    bic: {
      "default": '有効なBICコードを入力してください'
    },
    callback: {
      "default": '有効な値を入力してください'
    },
    choice: {
      between: '%s - %s で選択してください',
      "default": '有効な値を入力してください',
      less: '最低でも%sを選択してください',
      more: '最大でも%sを選択してください'
    },
    color: {
      "default": '有効なカラーコードを入力してください'
    },
    creditCard: {
      "default": '有効なクレジットカード番号を入力してください'
    },
    cusip: {
      "default": '有効なCUSIP番号を入力してください'
    },
    date: {
      "default": '有効な日付を入力してください',
      max: '%s の前に有効な日付を入力してください',
      min: '%s 後に有効な日付を入力してください',
      range: '%s - %s の間に有効な日付を入力してください'
    },
    different: {
      "default": '異なる値を入力してください'
    },
    digits: {
      "default": '数字のみで入力してください'
    },
    ean: {
      "default": '有効なEANコードを入力してください'
    },
    ein: {
      "default": '有効なEINコードを入力してください'
    },
    emailAddress: {
      "default": '有効なメールアドレスを入力してください'
    },
    file: {
      "default": '有効なファイルを選択してください'
    },
    greaterThan: {
      "default": '%sより大きい値を入力してください',
      notInclusive: '%sより大きい値を入力してください'
    },
    grid: {
      "default": '有効なGRIdコードを入力してください'
    },
    hex: {
      "default": '有効な16進数を入力してください。'
    },
    iban: {
      countries: {
        AD: 'アンドラ',
        AE: 'アラブ首長国連邦',
        AL: 'アルバニア',
        AO: 'アンゴラ',
        AT: 'オーストリア',
        AZ: 'アゼルバイジャン',
        BA: 'ボスニア·ヘルツェゴビナ',
        BE: 'ベルギー',
        BF: 'ブルキナファソ',
        BG: 'ブルガリア',
        BH: 'バーレーン',
        BI: 'ブルンジ',
        BJ: 'ベナン',
        BR: 'ブラジル',
        CH: 'スイス',
        CI: '象牙海岸',
        CM: 'カメルーン',
        CR: 'コスタリカ',
        CV: 'カーボベルデ',
        CY: 'キプロス',
        CZ: 'チェコ共和国',
        DE: 'ドイツ',
        DK: 'デンマーク',
        DO: 'ドミニカ共和国',
        DZ: 'アルジェリア',
        EE: 'エストニア',
        ES: 'スペイン',
        FI: 'フィンランド',
        FO: 'フェロー諸島',
        FR: 'フランス',
        GB: 'イギリス',
        GE: 'グルジア',
        GI: 'ジブラルタル',
        GL: 'グリーンランド',
        GR: 'ギリシャ',
        GT: 'グアテマラ',
        HR: 'クロアチア',
        HU: 'ハンガリー',
        IE: 'アイルランド',
        IL: 'イスラエル',
        IR: 'イラン',
        IS: 'アイスランド',
        IT: 'イタリア',
        JO: 'ヨルダン',
        KW: 'クウェート',
        KZ: 'カザフスタン',
        LB: 'レバノン',
        LI: 'リヒテンシュタイン',
        LT: 'リトアニア',
        LU: 'ルクセンブルグ',
        LV: 'ラトビア',
        MC: 'モナコ',
        MD: 'モルドバ',
        ME: 'モンテネグロ',
        MG: 'マダガスカル',
        MK: 'マケドニア',
        ML: 'マリ',
        MR: 'モーリタニア',
        MT: 'マルタ',
        MU: 'モーリシャス',
        MZ: 'モザンビーク',
        NL: 'オランダ',
        NO: 'ノルウェー',
        PK: 'パキスタン',
        PL: 'ポーランド',
        PS: 'パレスチナ',
        PT: 'ポルトガル',
        QA: 'カタール',
        RO: 'ルーマニア',
        RS: 'セルビア',
        SA: 'サウジアラビア',
        SE: 'スウェーデン',
        SI: 'スロベニア',
        SK: 'スロバキア',
        SM: 'サン·マリノ',
        SN: 'セネガル',
        TL: '東チモール',
        TN: 'チュニジア',
        TR: 'トルコ',
        VG: '英領バージン諸島',
        XK: 'コソボ共和国'
      },
      country: '有効な%sのIBANコードを入力してください',
      "default": '有効なIBANコードを入力してください'
    },
    id: {
      countries: {
        BA: 'スニア·ヘルツェゴビナ',
        BG: 'ブルガリア',
        BR: 'ブラジル',
        CH: 'スイス',
        CL: 'チリ',
        CN: 'チャイナ',
        CZ: 'チェコ共和国',
        DK: 'デンマーク',
        EE: 'エストニア',
        ES: 'スペイン',
        FI: 'フィンランド',
        HR: 'クロアチア',
        IE: 'アイルランド',
        IS: 'アイスランド',
        LT: 'リトアニア',
        LV: 'ラトビア',
        ME: 'モンテネグロ',
        MK: 'マケドニア',
        NL: 'オランダ',
        PL: 'ポーランド',
        RO: 'ルーマニア',
        RS: 'セルビア',
        SE: 'スウェーデン',
        SI: 'スロベニア',
        SK: 'スロバキア',
        SM: 'サン·マリノ',
        TH: 'タイ国',
        TR: 'トルコ',
        ZA: '南アフリカ'
      },
      country: '有効な%sのIDを入力してください',
      "default": '有効なIDを入力してください'
    },
    identical: {
      "default": '同じ値を入力してください'
    },
    imei: {
      "default": '有効なIMEIを入力してください'
    },
    imo: {
      "default": '有効なIMOを入力してください'
    },
    integer: {
      "default": '有効な数値を入力してください'
    },
    ip: {
      "default": '有効なIPアドレスを入力してください',
      ipv4: '有効なIPv4アドレスを入力してください',
      ipv6: '有効なIPv6アドレスを入力してください'
    },
    isbn: {
      "default": '有効なISBN番号を入力してください'
    },
    isin: {
      "default": '有効なISIN番号を入力してください'
    },
    ismn: {
      "default": '有効なISMN番号を入力してください'
    },
    issn: {
      "default": '有効なISSN番号を入力してください'
    },
    lessThan: {
      "default": '%s未満の値を入力してください',
      notInclusive: '%s未満の値を入力してください'
    },
    mac: {
      "default": '有効なMACアドレスを入力してください'
    },
    meid: {
      "default": '有効なMEID番号を入力してください'
    },
    notEmpty: {
      "default": '値を入力してください'
    },
    numeric: {
      "default": '有効な浮動小数点数値を入力してください。'
    },
    phone: {
      countries: {
        AE: 'アラブ首長国連邦',
        BG: 'ブルガリア',
        BR: 'ブラジル',
        CN: 'チャイナ',
        CZ: 'チェコ共和国',
        DE: 'ドイツ',
        DK: 'デンマーク',
        ES: 'スペイン',
        FR: 'フランス',
        GB: 'イギリス',
        IN: 'インド',
        MA: 'モロッコ',
        NL: 'オランダ',
        PK: 'パキスタン',
        RO: 'ルーマニア',
        RU: 'ロシア',
        SK: 'スロバキア',
        TH: 'タイ国',
        US: 'アメリカ',
        VE: 'ベネズエラ'
      },
      country: '有効な%sの電話番号を入力してください',
      "default": '有効な電話番号を入力してください'
    },
    promise: {
      "default": '有効な値を入力してください'
    },
    regexp: {
      "default": '正規表現に一致する値を入力してください'
    },
    remote: {
      "default": '有効な値を入力してください。'
    },
    rtn: {
      "default": '有効なRTN番号を入力してください'
    },
    sedol: {
      "default": '有効なSEDOL番号を入力してください'
    },
    siren: {
      "default": '有効なSIREN番号を入力してください'
    },
    siret: {
      "default": '有効なSIRET番号を入力してください'
    },
    step: {
      "default": '%sの有効なステップを入力してください'
    },
    stringCase: {
      "default": '小文字のみで入力してください',
      upper: '大文字のみで入力してください'
    },
    stringLength: {
      between: '%s文字から%s文字の間で入力してください',
      "default": '有効な長さの値を入力してください',
      less: '%s文字未満で入力してください',
      more: '%s文字より大きく入力してください'
    },
    uri: {
      "default": '有効なURIを入力してください。'
    },
    uuid: {
      "default": '有効なUUIDを入力してください',
      version: '有効なバージョン%s UUIDを入力してください'
    },
    vat: {
      countries: {
        AT: 'オーストリア',
        BE: 'ベルギー',
        BG: 'ブルガリア',
        BR: 'ブラジル',
        CH: 'スイス',
        CY: 'キプロス等',
        CZ: 'チェコ共和国',
        DE: 'ドイツ',
        DK: 'デンマーク',
        EE: 'エストニア',
        EL: 'ギリシャ',
        ES: 'スペイン',
        FI: 'フィンランド',
        FR: 'フランス',
        GB: 'イギリス',
        GR: 'ギリシャ',
        HR: 'クロアチア',
        HU: 'ハンガリー',
        IE: 'アイルランド',
        IS: 'アイスランド',
        IT: 'イタリア',
        LT: 'リトアニア',
        LU: 'ルクセンブルグ',
        LV: 'ラトビア',
        MT: 'マルタ',
        NL: 'オランダ',
        NO: 'ノルウェー',
        PL: 'ポーランド',
        PT: 'ポルトガル',
        RO: 'ルーマニア',
        RS: 'セルビア',
        RU: 'ロシア',
        SE: 'スウェーデン',
        SI: 'スロベニア',
        SK: 'スロバキア',
        VE: 'ベネズエラ',
        ZA: '南アフリカ'
      },
      country: '有効な%sのVAT番号を入力してください',
      "default": '有効なVAT番号を入力してください'
    },
    vin: {
      "default": '有効なVIN番号を入力してください'
    },
    zipCode: {
      countries: {
        AT: 'オーストリア',
        BG: 'ブルガリア',
        BR: 'ブラジル',
        CA: 'カナダ',
        CH: 'スイス',
        CZ: 'チェコ共和国',
        DE: 'ドイツ',
        DK: 'デンマーク',
        ES: 'スペイン',
        FR: 'フランス',
        GB: 'イギリス',
        IE: 'アイルランド',
        IN: 'インド',
        IT: 'イタリア',
        MA: 'モロッコ',
        NL: 'オランダ',
        PL: 'ポーランド',
        PT: 'ポルトガル',
        RO: 'ルーマニア',
        RU: 'ロシア',
        SE: 'スウェーデン',
        SG: 'シンガポール',
        SK: 'スロバキア',
        US: 'アメリカ'
      },
      country: '有効な%sの郵便番号を入力してください',
      "default": '有効な郵便番号を入力してください'
    }
  };
  return ja_JP;
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/assets/vendor/libs/formvalidation/dist/js/locales/ja_JP.js");
/******/ 	
/******/ 	return __webpack_exports__;
/******/ })()
;
});