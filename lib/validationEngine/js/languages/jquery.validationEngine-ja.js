/*****************************************************************
 * Japanese language file for jquery.validationEngine.js (ver2.0)
 *
 * Transrator: tomotomo ( Tomoyuki SUGITA )
 * http://tomotomoSnippet.blogspot.com/
 * Licenced under the MIT Licence
 *******************************************************************/
(function($){
    $.fn.validationEngineLanguage = function(){
    };
    $.validationEngineLanguage = {
        newLang: function(){
            $.validationEngineLanguage.allRules = {
                "required": { // Add your regex rules here, you can take telephone as an example
                    "regex": "none",
                    "alertText": "* 必須項目です",
                    "alertTextCheckboxMultiple": "* 選択してください",
                    "alertTextCheckboxe": "* チェックボックスをチェックしてください"
                },
                "requiredInFunction": { 
                    "func": function(field, rules, i, options){
                        return (field.val() == "test") ? true : false;
                    },
                    "alertText": "* 场必须等于测试"
                },
                "minSize": {
                    "regex": "none",
                    "alertText": "* ",
                    "alertText2": "文字以上にしてください"
                },
				"groupRequired": {
                    "regex": "none",
                    "alertText": "* You must fill one of the following fields"
                },
                "maxSize": {
                    "regex": "none",
                    "alertText": "* ",
                    "alertText2": "文字以下にしてください"
                },
                "min": {
                    "regex": "none",
                    "alertText": "* ",
                    "alertText2": " 以上の数値にしてください"
                },
                "max": {
                    "regex": "none",
                    "alertText": "* ",
                    "alertText2": " 以下の数値にしてください"
                },
                "past": {
                    "regex": "none",
                    "alertText": "* ",
                    "alertText2": " より過去の日付にしてください"
                },
                "future": {
                    "regex": "none",
                    "alertText": "* ",
                    "alertText2": " より最近の日付にしてください"
                },	
                "maxCheckbox": {
                    "regex": "none",
                    "alertText": "* チェックしすぎです"
                },
                "minCheckbox": {
                    "regex": "none",
                    "alertText": "* ",
                    "alertText2": "つ以上チェックしてください"
                },
                "equals": {
                    "regex": "none",
                    "alertText": "* 入力された値が一致しません"
                },
                "creditCard": {
                    "regex": "none",
                    "alertText": "* 無効なクレジットカード番号"
                },
                "phone": {
                    // credit: jquery.h5validate.js / orefalo
                    "regex": /^([\+][0-9]{1,3}([ \.\-])?)?([\(][0-9]{1,6}[\)])?([0-9 \.\-]{1,32})(([A-Za-z \:]{1,11})?[0-9]{1,4}?)$/,
                    "alertText": "* 電話番号が正しくありません"
                },
                "email": {
                    // Shamelessly lifted from Scott Gonzalez via the Bassistance Validation plugin http://projects.scottsplayground.com/email_address_validation/
                    "regex": /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,
                    "alertText": "* メールアドレスが正しくありません"
                },
                "integer": {
                    "regex": /^[\-\+]?\d+$/,
                    "alertText": "* 整数を半角で入力してください"
                },
                "number": {
                    // Number, including positive, negative, and floating decimal. credit: orefalo
                    "regex": /^[\-\+]?((([0-9]{1,3})([,][0-9]{3})*)|([0-9]+))?([\.]([0-9]+))?$/,
                    "alertText": "* 数値を半角で入力してください"
                },
                "date": {
                    "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/,
                    "alertText": "* 日付は半角で YYYY-MM-DD の形式で入力してください"
                },
                "ipv4": {
                	"regex": /^((([01]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))[.]){3}(([0-1]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))$/,
                    "alertText": "* IPアドレスが正しくありません"
                },
                "url": {
                    "regex": /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i,
                    "alertText": "* URLが正しくありません"
                },
                "onlyNumberSp": {
                    "regex": /^[0-9\ ]+$/,
                    "alertText": "* 半角数字で入力してください"
                },
                "onlyLetterSp": {
                    "regex": /^[a-zA-Z\ \']+$/,
                    "alertText": "* 半角アルファベットで入力してください"
                },
                "onlyLetterNumber": {
                    "regex": /^[0-9a-zA-Z]+$/,
                    "alertText": "* 半角英数で入力してください"
                },
				//Start Custom Validation
				//1)First Name,Last Name
				"onlyLetter_specialcharacter": 
				{
                     "regex": /^[a-zA-Z\u3000-\u303F\u3040-\u309F\u30A0-\u30FF\uFF00-\uFFEF\u4E00-\u9FAF\u2605-\u2606\u2605-\u2606\u2190-\u2195\ \_\,\`\.\'\^\-]+$/,
                    "alertText": "* 唯一の手紙 ' _,`.'^-' 許可された文字"
                },
				//2)City,State,Country
				"city_state_country_validation": 
				{
                    "regex": /^[a-zA-Z\u3000-\u303F\u3040-\u309F\u30A0-\u30FF\uFF00-\uFFEF\u4E00-\u9FAF\u2605-\u2606\u2605-\u2606\u2190-\u2195\ \_\,\`\.\'\^\-\&]+$/,
                    "alertText": "* 唯一の手紙 ' _,`.'^-&' 許可された文字"
                },
				//3)PopUp Category,Medicine Name,Event Name
				"popup_category_validation": 
				{
                    "regex": /^[0-9a-zA-Z\u303F\u3040-\u309F\u30A0-\u30FF\uFF00-\uFFEF\u4E00-\u9FAF\u2605-\u2606\u2605-\u2606\u2190-\u2195\ \_\,\`\.\'\^]+$/,
                    "alertText": "* 唯一の文字、数字、そして ' _,`.'^' 許可された文字"
                },
				//4)Address and Description
				"address_description_validation": 
				{
                    "regex": /^[0-9a-zA-Z\u303F\u3040-\u309F\u30A0-\u30FF\uFF00-\uFFEF\u4E00-\u9FAF\u2605-\u2606\u2605-\u2606\u2190-\u2195\ \_\,\`\.\'\^\-\&\n]+$/,
                    "alertText": "* 唯一の文字、数字、そして ' _,`.'^-&' 許可された文字"
                },
				//5)UserName
				"username_validation": 
				{
                    "regex": /^[0-9a-zA-Z\u303F\u3040-\u309F\u30A0-\u30FF\uFF00-\uFFEF\u4E00-\u9FAF\u2605-\u2606\u2605-\u2606\u2190-\u2195\_\.\-\@]+$/,
                    "alertText": "* 唯一の文字、数字、そして '_.-@' 許可された文字"
                }, 
				//6)Phone Number
				"phone_number": 
				{
                    "regex": /^[0-9\ \-\+]+$/,
                    "alertText": "* 数字だけ ' -+' 許可された文字"
                }, 
				// End Custom Validation
                // --- CUSTOM RULES -- Those are specific to the demos, they can be removed or changed to your likings
                "ajaxUserCall": {
                    "url": "ajaxValidateFieldUser",
                    // you may want to pass extra data on the ajax call
                    "extraData": "name=eric",
                    "alertText": "* このユーザー名は既に登録されています",
                    "alertTextLoad": "* Validating, please wait"
                },
                "ajaxNameCall": {
                    // remote json service location
                    "url": "ajaxValidateFieldName",
                    // error
                    "alertText": "* このユーザー名は既に登録されています",
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertTextOk": "* This name is available",
                    // speaks by itself
                    "alertTextLoad": "* Validating, please wait"
                },
                "validate2fields": {
                    "alertText": "* 『HELLO』と入力してください"
                }
            };
            
        }
    };
    $.validationEngineLanguage.newLang();
})(jQuery);


    
