
var allLocations = [];
// Omniva locations widget
var OmnivaWidget = function () {
        var _that = this;
        /* configuration

        defaults can be overriden when you are initializing the widget
         Example:
         var widget = new OmnivaWidget({
            compact_mode: true,
            show_offices: false,
            css: {
                select: 'myClass_select',
                input: 'myClass_input',
                div: 'myClass_div',
                td: 'myClass_td',
                tr: 'myClass_tr',
                table: 'myClass_table'
            }
         });
        */

        var defaults = {
            /*
             * Url of locations, normally you don't need to change it
             */
            locations_url : 'https://www.omniva.lv/widget/locations.js',
            /*
             * unique html element id of the container which will contain the dropdown and other info
             */
            container_id : 'omniva_container',
            /*
             * unique <select> element id  which will contain the locations dropdown
             */
            select_id :'omniva_select',
            /*
             * unique <hidden> element id  which will contain the <select> dropdown selection textual value.
             */
            selection_value_id :'omniva_selection_value',
            /*
             * unique <input> element id which will be filled with the city name on selection
             */
            city_id : 'omniva_city',
            /*
             * unique <input> element id  which will be filled with the address on selection
             */
            address_id : 'omniva_address',
            /*
             * unique <input> element id  which will be filled with the open hours on selection (if available)
             */
            open_hours_id : 'omniva_open_hours',
            /*
             * unique <textarea> element id  which will be filled with the location description on selection
             */
            description_id: 'omniva_description',
            /*
             * will be added to the unique element ids  if you are going to have more than one widget
             */
            id: 1,
            /*
             * if preselected value is required, value text is expected here.
             * If not found - no default selection will be available.
             * preselection value is case insensitive and trimmed before compartion.
             */
            selection_value: '',
            /*
             * country code
             */
            country_id: 'LV',
            /*
             * if enabled only a dropdown with locations will be shown
             */
            compact_mode : false,
            /*
             * if disabled post offices won't be shown in dropdown
             */
            show_offices : true,
            /*
             * if disabled pack machines won't be shown in dropdown
             */
            show_machines: true,
            /*
             * instead of predefined html you may create your own html
             * and it will be included in container
             */
            custom_html: false,
            /*
             * show omniva logo
             */
            show_logo: true,
            /*
             * show explanation text
             */
            show_explanation: true,
            /*
             * translations:
             * you can override default translations with your own
             */
            text : {"widget_select_label":"Location","widget_city_label":"City","widget_address_label":"Address","widget_open_hours_label":"Opening hours","widget_description_label":"Temporary service hours","widget_explanation_text":"widget_explanation_text"},
            /*
             * CSS classes to be added to the generated html
             */
            css: {
                select: 'ow_select',
                input: 'ow_input',
                div: 'ow_div',
                td: 'ow_td',
                tr: 'ow_tr',
                table: 'ow_table',
                p: 'ow_p'
            }
        };
        /* configuration end */

        _that._select = null;
        _that._locations = {};
        _that._rawLocations = {};
        _that._container = null;
        _that._lang = 'est';
        _that.options = defaults;

        // setup the custom options
        if (arguments[0] && typeof arguments[0] === "object") {
            _that.options = extendDefaults(defaults, arguments[0]);
        }

        // initialize <select> dropdown
        _that.initSelect = function () {
            this._select = document.getElementById(this.options.select_id + this.options.id);
            if (!this._select && this.options.custom_html) {
                throw ('Custom html mode: please create <select> element');
                return;
            }
            var html  = '';

            var preselection_made = 0;
            var preselection_value = this.options.selection_value.trim().toLowerCase();

            var tmpArray = Object.keys(this._locations).sort();
            for (var i=0;i< tmpArray.length;i++) {
                var optgroup = tmpArray[i];
                if (typeof this._locations[optgroup] == 'object') {
                    html += '<optgroup label="'+optgroup+'">';
                    for (var key in this._locations[optgroup]) {
                        if (typeof this._locations[optgroup][key] == 'object') {
                            var item = this._locations[optgroup][key];
                            if ((this.options.show_offices && item.TYPE != '0') ||
                            (this.options.show_machines && item.TYPE == '0'))
                            {
                                if(preselection_value.length > 0 && preselection_value == item.NAME.trim().toLowerCase()) {
	                               	preselection_made = 1;
                                    html += '<option value="'+item.ZIP+'" selected>'+item.NAME+'</option>'+"\n";
                            	} else {
	                               	html += '<option value="'+item.ZIP+'">'+item.NAME+'</option>'+"\n";
                            	}
                            }
                        }
                    }
                    html += '</optgroup>';
                }
            }
            this._select.innerHTML = html;
            this._select.addEventListener("change", function () {
                _that.selectThis(this);
            })

            if(preselection_made == 1) {
                this.selectThis(this._select);
            }
        }
        // create default html layout
        _that.drawHTML = function () {
            _that._container = document.getElementById(this.options.container_id + this.options.id);
            if (_that.options.custom_html) {
                return;
            } else {
                var elements = {
                    select : { key: 'select_id', compact: false, type: 'select'},
                    selection_value : { key: 'selection_value_id', compact: false, type: 'hidden' },
                    city: {key : 'city_id', compact: true, type : 'input'},
                    address: {key: 'address_id', compact : true, type : 'input'},
                    open_hours: {key: 'open_hours_id', compact : true, type : 'textarea'},
                    description: {key: 'description_id', compact : true, type : 'textarea'}
                };
                var html = '';
                if (this.options.show_explanation) {
                  //  html += '<p class="'+this.options.css.p+'">'+this.options.text['widget_explanation_text']+'</p>';
                }
                if (this.options.show_logo) {
                    html += '<img src="https://www.omniva.lv/theme/post24/img/logo.png">';

                }
                html += '<table class="'+this.options.css.table+'">';
                for (var element in elements) {
                    var item = elements[element];
                    var name = this.options[item.key]+this.options.id;
                    if ((!this.options.compact_mode && item.compact == true) || !item.compact) {
                        html += '<tr class="'+this.options.css.tr+'">';
                        if(item.type != 'hidden') {
                            html += '<td class="'+this.options.css.td+'">';
                            html += '<label for="'+name+'">'+this.options.text['widget_'+element+'_label']+'</label></td>';
                            html += '<td class="'+this.options.css.td+'">';
                            html += '<'+item.type+' id="'+name+'" name="'+name+'" '+(item.compact ? 'readonly="readonly"' :'')+(item.type == 'text' ? '/>' : '></'+item.type+'>');
                            html += '</td>';
                        } else {
                            html += '<td colspan=2>';
                            html += '<input id="'+name+'" name="'+name+'" value="" type="hidden"/>';
                            html += '</td>';
                        }
                        html += '</tr>';
                    }
                }
                html += '</table>';
                _that._container.innerHTML = html;

            }
        }

        // handle the json of locations
        _that.parseJson = function (json) {
            var len = json.length;
            for (var i = 0;i < len;i++) {
                if (typeof this._rawLocations[json[i]['A0_NAME']] == 'undefined') {
                    this._rawLocations[json[i]['A0_NAME']] = {};
                }
                this._rawLocations[json[i]['A0_NAME']][json[i]['ZIP']] = json[i];
                if (typeof json[i] == 'object' && json[i].A0_NAME === this.options.country_id) {
                    if (typeof this._locations[json[i].A1_NAME] == 'undefined') {
                        this._locations[json[i].A1_NAME] = [];
                    }
                    this._locations[json[i].A1_NAME].push(json[i]);

                }
            }
        }
        // main handler
        _that.prepareWidget = function (json) {
            this.parseJson(json);
            this.drawHTML();
            this.initSelect();

        }

        // update rows when a selection in drodown is done
        _that.selectThis = function (select) {
            // find element in locations array
            var mapping = {
                city_id : ['A2_NAME'],
                address_id: ['A1_NAME', 'A2_NAME', 'A3_NAME', 'A4_NAME', 'A5_NAME', 'A6_NAME', 'A7_NAME','A8_NAME'],
                open_hours_id: ['SERVICE_HOURS'],
                description_id: ['TEMP_SERVICE_HOURS']
            };

            if (select.value && typeof this._rawLocations[this.options.country_id][select.value]  != 'undefined') {
                var selElement =  document.getElementById(this.options.selection_value_id + this.options.id);
                if (selElement) {
                    selElement.value = select.options[select.selectedIndex].text;
                }

                var item = this._rawLocations[this.options.country_id][select.value]
                var el = null;
                var now = new Date();
                for (var el in mapping) {
                    element = document.getElementById(this.options[el] + this.options.id);
                    if (typeof element != 'undefined' && element) {
                        var dataArray = [];
                        var value = '';
                        for (var prop in mapping[el]) {
                            var tmp = '';
                            tmp = item[mapping[el][prop]];
                            if (mapping[el][prop] == 'TEMP_SERVICE_HOURS') {
                                if (item['TEMP_SERVICE_HOURS_UNTIL'] != 'NULL') {
                                    var dtArr = item['TEMP_SERVICE_HOURS_UNTIL'].split(".");
                                    var dt = new Date(dtArr[2]+"-"+dtArr[1]+"-"+dtArr[0]+' 23:59:59');
                                    if (dt < now) {
                                        tmp = '';
                                    }
                                }
                                if (item['TEMP_SERVICE_HOURS_2'] != "NULL" && item['TEMP_SERVICE_HOURS_2_UNTIL'] != 'NULL') {
                                    var dtArr = item['TEMP_SERVICE_HOURS_2_UNTIL'].split(".");
                                    var dt = new Date(dtArr[2]+"-"+dtArr[1]+"-"+dtArr[0]+' 23:59:59');
                                    if (dt < now) {
                                        } else {
                                            tmp += "\n"+item['TEMP_SERVICE_HOURS_2'];
                                        }
                                    }
                                }
                            if (typeof tmp != 'undefined' && tmp && tmp != 'NULL' && tmp.trim()) {
                                dataArray.push(tmp);
                            }
                        }
                        value = dataArray.join(',');
                        element.value = value;
                    }
                }
            }
        }
        // initialize locations
        try {
            jsonp(_that, {
                callbackName: 'prepareJson',
                onSuccess: function(json, Widget){
                    Widget.prepareWidget(json);
                },
                onTimeout: function() {
                },
                timeout: 5
            });
        } catch (a) {
            throw('Error fetching data from url', a);
        }
    }

    // helper functions

    // extend options with the custom options
    function extendDefaults(source, properties) {
        var property;
        for (property in properties) {
            if (properties.hasOwnProperty(property)) {
                source[property] = properties[property];
            }
        }
        return source;
    }

    // load the json from the omniva server
    function jsonp (resource, options) {

        var callback_name = options.callbackName || 'callback';
        var on_success = options.onSuccess || function(){},
        on_timeout = options.onTimeout || function(){},
        timeout = options.timeout || 10; // sec
        if (window[callback_name] == undefined) {
            var timeout_trigger = window.setTimeout(function(){
                window[callback_name] = function(){};
                on_timeout();
            }, timeout * 1000);

            window[callback_name] = function(data){
                window.clearTimeout(timeout_trigger);
                allLocations = data;
                on_success(data, resource);
            }

            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.async = true;
            script.id = 'jsonp';
            script.src = resource.options.locations_url;
            document.getElementsByTagName('head')[0].appendChild(script);
        } else {
            checkLocations(function () {
                on_success(allLocations, resource);
            });
        }
    }
    function checkLocations (callback) {
        if (allLocations.length) {
            callback.call(this);
        } else {
            var t = this;
            setTimeout(function () {
                t.checkLocations.call(t, callback);
            }, 50);
        }
    }
