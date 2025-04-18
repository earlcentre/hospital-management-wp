(function($){
    $.fn.validationEngineLanguage = function(){
    };
    $.validationEngineLanguage = {
        newLang: function(){
            $.validationEngineLanguage.allRules = {
                "required": { // Add your regex rules here, you can take telephone as an example
                    "regex": "none",
                    "alertText": "*  Kenttä on pakollinen",
                    "alertTextCheckboxMultiple": "* Yksi valikoima, kiitos",
                    "alertTextCheckboxe": "* Tarkistusmerkki on pakollinen"
                },
                "requiredInFunction": { 
                    "func": function(field, rules, i, options){
                        return (field.val() == "test") ? true : false;
                    },
                    "alertText": "* Kenttä on sama testi"
                },
                "minSize": {
                    "regex": "none",
                    "alertText": "* Vähintään ",
                    "alertText2": " merkkiä sallittu"
                },
                "maxSize": {
                    "regex": "none",
                    "alertText": "* Enintään ",
                    "alertText2": " merkkiä sallittu"
                },
                "min": {
                    "regex": "none",
                    "alertText": "* Vähittäisluku on "
                },
                "max": {
                    "regex": "none",
                    "alertText": "* Enimmäisluku on "
                },
                "past": {
                    "regex": "none",
                    "alertText": "* Päivämäärä ennen "
                },
                "future": {
                    "regex": "none",
                    "alertText": "* Päivämäärä jälkeen "
                },	
                "maxCheckbox": {
                    "regex": "none",
                    "alertText": "* Enintään ",
                    "alertText2": " valikoimaa sallittu"
                },
                "minCheckbox": {
                    "regex": "none",
                    "alertText": "* Valitse ",
                    "alertText2": " valikoima(a)"
                },
                "equals": {
                    "regex": "none",
                    "alertText": "* Kentät eivät täsmää"
                },
                "creditCard": {
                    "regex": "none",
                    "alertText": "* Luottokortin numero ei kelpaa"
                },
                "phone": {
                    // credit: jquery.h5validate.js / orefalo
                    "regex": /^([\+][0-9]{1,3}([ \.\-])?)?([\(][0-9]{1,6}[\)])?([0-9 \.\-]{1,32})(([A-Za-z \:]{1,11})?[0-9]{1,4}?)$/,
                    "alertText": "* Viallinen puhelinnumero"
                },
                "email": {
                    // Shamelessly lifted from Scott Gonzalez via the Bassistance Validation plugin http://projects.scottsplayground.com/email_address_validation/
                    "regex": /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,
                    "alertText": "* Viallinen sähköpostiosoite"
                },
                "integer": {
                    "regex": /^[\-\+]?\d+$/,
                    "alertText": "* Sopimaton numero"
                },
                "number": {
                    // Number, including positive, negative, and floating decimal. credit: orefalo
                    "regex": /^[\-\+]?((([0-9]{1,3})([,][0-9]{3})*)|([0-9]+))?([\.]([0-9]+))?$/,
                    "alertText": "* Viallinen luku"
                },
                "date": {
                    "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/,
                    "alertText": "* Viallinen päivämäärä. Päivämäärän  täytyy olla VVVV-KK-PP muodossa"
                },
                "ipv4": {
                    "regex": /^((([01]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))[.]){3}(([0-1]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))$/,
                    "alertText": "* Viallinen IP-osoite"
                },
                "url": {
                    "regex": /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i,
                    "alertText": "* Viallinen URL"
                },
                "onlyNumberSp": {
                    "regex": /^[0-9\ ]+$/,
                    "alertText": "* Ainostaan numeroin"
                },
                "onlyLetterSp": {
                    "regex": /^[a-zA-Z\ \']+$/,
                    "alertText": "* Ainoastaan kirjaimin"
                },
				"onlyLetterAccentSp":{
                    "regex": /^[a-z\u00C0-\u017F\ ]+$/i,
                    "alertText": "* Ainoastaan kirjaimin"
                },
                "onlyLetterNumber": {
                    "regex": /^[0-9a-zA-Z]+$/,
                    "alertText": "* Erikoismerkit eivät ole sallittuja"
                },//Start Custom Validation
				//1)First Name,Last Name
				"onlyLetter_specialcharacter": 
				{
                     "regex": /^[a-zA-Z\u00C0-\u017F\ \_\,\`\.\'\^\-]+$/,
                    "alertText": "* Vain kirjaimet ja ' _,`.'^-' Merkit sallittu"
                },
				//2)City,State,Country
				"city_state_country_validation": 
				{
                    "regex": /^[a-zA-Z\u00C0-\u017F\ \_\,\`\.\'\^\-\&]+$/,
                    "alertText": "* Vain kirjaimet ja ' _,`.'^-&' Merkit sallittu"
                },
				//3)PopUp Category,Medicine Name,Event Name
				"popup_category_validation": 
				{
                    "regex": /^[0-9a-zA-Z\u00C0-\u017F\ \_\,\`\.\'\^]+$/,
                    "alertText": "* Vain kirjaimet, numerot ja ' _,`.'^' Merkit sallittu"
                },
				//4)Address and Description
				"address_description_validation": 
				{
                    "regex": /^[0-9a-zA-Z\u00C0-\u017F\ \_\,\`\.\'\^\-\&\n]+$/,
                    "alertText": "* Vain kirjaimet, numerot ja ' _,`.'^-&' Merkit sallittu"
                },
				//5)UserName
				"username_validation": 
				{
                    "regex": /^[0-9a-zA-Z\u00C0-\u017F\_\.\-\@]+$/,
                    "alertText": "* Vain kirjaimet, numerot ja '_.-@' Merkit sallittu"
                }, 
				//6)Phone Number
				"phone_number": 
				{
                    "regex": /^[0-9\ \-\+]+$/,
                    "alertText": "* Vain numerot ja ' -+' Merkit sallittu"
                } 
				// end Custom Validation				
            };
            
        }
    };
    $.validationEngineLanguage.newLang();
})(jQuery);
