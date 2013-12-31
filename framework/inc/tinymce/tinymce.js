/*-----------------------------------------------------------------------------------*/
/*	Accordion
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.accordion', {  
        init : function(ed, url) {  
            ed.addButton('accordion', {  
                title : 'Add Accordion',  
                image : url+'/accordion.png',  
                onclick : function() {  
                     ed.selection.setContent('[accordion open="2"]<br />[accordion-item title="First Tab Title"]Your Text[/accordion-item]<br />[accordion-item title="Second Tab Title"]Your Text[/accordion-item]<br />[accordion-item title="Third Tab Title"]Your Text[/accordion-item]<br />[/accordion]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {
            return null;
        },  
    });
    tinymce.PluginManager.add('accordion', tinymce.plugins.accordion);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Toggle
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.toggle', {  
        init : function(ed, url) {  
            ed.addButton('toggle', {  
                title : 'Add Faq Or Toggle',  
                image : url+'/toggle.png',  
                onclick : function() {  
                     ed.selection.setContent('[toggle title="Toggle Title goes here" open="true or false" icon="star"]Your Content goes here...[/toggle]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('toggle', tinymce.plugins.toggle);  
})();


/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.tabs', {  
        init : function(ed, url) {  
            ed.addButton('tabs', {  
                title : 'Add Tabs',  
                image : url+'/tab.png',  
                onclick : function() {  
                     ed.selection.setContent('[tabgroup]<br />[tab title="Tab 1"]Tab 1 content goes here.[/tab]<br />[tab title="Tab 2"]Tab 2 content goes here.[/tab]<br />[tab title="Tab 3"]Tab 3 content goes here.[/tab]<br />[/tabgroup]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('tabs', tinymce.plugins.tabs);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Testimonial
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.testimonial', {  
        init : function(ed, url) {  
            ed.addButton('testimonial', {  
                title : 'Add Testimonial',  
                image : url+'/testimonial.png',  
                onclick : function() {  
                     ed.selection.setContent('[testimonial]<br />[tms author="<strong>John Doe</strong>, Company"]Content goes here.[/tms]<br />[tms author="<strong>John Doe</strong>, Company"]Content goes here.[/tms]<br />[tms author="<strong>John Doe</strong>, Company"]Content goes here.[/tms]<br />[/testimonial]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('testimonial', tinymce.plugins.testimonial);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Alert
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.alert', {  
        init : function(ed, url) {  
            ed.addButton('alert', {  
                title : 'Add a Alert',  
                image : url+'/alert.png',  
                onclick : function() {  
                     ed.selection.setContent('[alert type="notice, success, error, info" close="true"]Your Message[/alert]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('alert', tinymce.plugins.alert);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Blockquote
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.quote', {  
        init : function(ed, url) {  
            ed.addButton('quote', {  
                title : 'Add Blockquote',  
                image : url+'/quote.png',  
                onclick : function() {  
                     ed.selection.setContent('[quote]Quote goes here...[/quote]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('quote', tinymce.plugins.quote);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Dropcap
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.dropcap', {  
        init : function(ed, url) {  
            ed.addButton('dropcap', {  
                title : 'Add Dropcap',  
                image : url+'/dropcap.png',  
                onclick : function() {  
                     ed.selection.setContent('[dropcap style="circle, box"]D[/dropcap]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('dropcap', tinymce.plugins.dropcap);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Tooltip
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.tooltip', {  
        init : function(ed, url) {  
            ed.addButton('tooltip', {  
                title : 'Add Tooltip',  
                image : url+'/tooltip.png',  
                onclick : function() {  
                     ed.selection.setContent('[tooltip text="Tooltip Text"]Word[/tooltip]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('tooltip', tinymce.plugins.tooltip);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Tooltip
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.highlight', {  
        init : function(ed, url) {  
            ed.addButton('highlight', {  
                title : 'Add Highlight',  
                image : url+'/highlight.png',  
                onclick : function() {  
                     ed.selection.setContent('[highlight]Text[/highlight]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('highlight', tinymce.plugins.highlight);  
})();

/*-----------------------------------------------------------------------------------*/
/*	List
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.list', {  
        init : function(ed, url) {  
            ed.addButton('list', {  
                title : 'Add List',  
                image : url + '/list.png',  
                onclick : function() {  
					ed.focus();
                    ed.selection.setContent('[list type="check"]<br/>\
						<ul class="check">\
						<li>ADD_LIST_CONTENT</li>\
						<li>ADD_LIST_CONTENT</li>\
						</ul>\
						[/list]<br/>');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        }
    });  
    tinymce.PluginManager.add('list', tinymce.plugins.list);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Video
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.video', {  
        init : function(ed, url) {  
            ed.addButton('video', {  
                title : 'Add Video',  
                image : url+'/video.png',  
                onclick : function() {  
                     ed.selection.setContent('[video type="youtube, vimeo, dailymotion" id="Enter video ID (eg. 8F7UOBIT4Vk)"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('video', tinymce.plugins.video);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Maps
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.maps', {  
        init : function(ed, url) {  
            ed.addButton('maps', {  
                title : 'Add Google Maps',  
                image : url+'/maps.png',  
                onclick : function() {  
                     ed.selection.setContent('[map h="400" style="full, standard" z="16" marker="yes" infowindow="Hello World!" infowindowdefault="yes or no" maptype="SATELLITE, ROADMAP, TERRAIN" hidecontrols="true or false" address="New York"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('maps', tinymce.plugins.maps);  
})();


/*-----------------------------------------------------------------------------------*/
/*	Maps
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.contact_info', {  
        init : function(ed, url) {  
            ed.addButton('contact_info', {  
                title : 'Add Contact Info',  
                image : url+'/contact.png',  
                onclick : function() {  
                     ed.selection.setContent('[contact_info title="房产中介" name="姓名"][/contact_info]');
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('contact_info', tinymce.plugins.contact_info);  
})();

/*-----------------------------------------------------------------------------------*/
/*	wiki
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.wiki', {  
        init : function(ed, url) {  
            ed.addButton('wiki', {  
                title : 'wiki',  
                image : url+'/wiki.png',  
                onclick : function() {  
                     ed.selection.setContent('[wiki][/wiki]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('wiki', tinymce.plugins.wiki);  
})();

/*-----------------------------------------------------------------------------------*/
/*	house
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.house', {  
        init : function(ed, url) {  
            ed.addButton('house', {  
                title : 'house-search-form',  
                image : url+'/house.png',  
                onclick : function() {  
                     ed.selection.setContent('[house_search project_name=""][/house_search]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('house', tinymce.plugins.house);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Clear
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.clear', {  
        init : function(ed, url) {  
            ed.addButton('clear', {  
                title : 'Add Clear',  
                image : url+'/divider.png',  
                onclick : function() {  
                     ed.selection.setContent('[clear]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('clear', tinymce.plugins.clear);  
})();


/*-----------------------------------------------------------------------------------*/
/*	Member
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.member', {  
        init : function(ed, url) {  
            ed.addButton('member', {  
                title : 'Add Member',  
                image : url+'/member.png',  
                onclick : function() {  
                     ed.selection.setContent('[member name="John Doe" role="Web Developer" img="http://themes.com/nopic.png" twitter="http://twitter.com" facebook="http://facebook.com" skype="http://skype.com" google="http://google.de" linkedin="http://linkedin.com" mail="hello@gmail.com"]Description[/member]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('member', tinymce.plugins.member);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Skill
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.skill', {  
        init : function(ed, url) {  
            ed.addButton('skill', {  
                title : 'Add Skillbar',  
                image : url+'/skill.png',  
                onclick : function() {  
                     ed.selection.setContent('[skill percentage="90" title="Photoshop & Illustrator 90%"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('skill', tinymce.plugins.skill);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Pricing Table
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.pricing_table', {  
        init : function(ed, url) {  
            ed.addButton('pricing_table', {  
                title : 'Add pricing table',  
                image : url+'/price-item.png',  
                onclick : function() {  
                     ed.selection.setContent('[pricing_table type="e.g. 1 or 2"][pricing_column title="Standard"][pricing_price]$10[/pricing_price][pricing_row]Feature 1[/pricing_row][pricing_footer link="http://www.signuplink.com"]Sign Up Now[/pricing_footer][/pricing_column][/pricing_table]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('pricing_table', tinymce.plugins.pricing_table);  
})();



/*-----------------------------------------------------------------------------------*/
/*	Headline
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.headlines', {  
        init : function(ed, url) {  
            ed.addButton('headlines', {  
                title : 'Add Headline (h1, h2,...)',  
                image : url+'/headline.png',  
                onclick : function() {  
                     ed.selection.setContent('[headlines headline="h1, h2, h3, h4, h5, h6" ]Your Content Here.. [/headlines]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('headlines', tinymce.plugins.headlines);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Vimeo
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.vimeo', {  
        init : function(ed, url) {  
            ed.addButton('vimeo', {  
                title : 'Add Vimeo',  
                image : url + '/vimeo.png',  
                onclick : function() {  
					ed.focus();
                    ed.selection.setContent('[vimeo width="300px" height="200px"]Place vimeo video ID here[/vimeo]<br/>');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        }
    });  
    tinymce.PluginManager.add('vimeo', tinymce.plugins.vimeo);  
})(); 

/*-----------------------------------------------------------------------------------*/
/*	Youtube
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.youtube', {  
        init : function(ed, url) {  
            ed.addButton('youtube', {  
                title : 'Add Youtube',  
                image : url + '/youtube.png',  
                onclick : function() {  
					ed.focus();
                    ed.selection.setContent('[youtube width="300px" height="200px"]Place youtube video ID here[/youtube]<br/>');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        }
    });  
    tinymce.PluginManager.add('youtube', tinymce.plugins.youtube);  
})(); 

/*-----------------------------------------------------------------------------------*/
/*	Highlight
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.googlefont', {  
        init : function(ed, url) {  
            ed.addButton('googlefont', {  
                title : 'Add Googlefont Typo',  
                image : url+'/googlefont.png',  
                onclick : function() {  
                     ed.selection.setContent('[googlefont font="Chewy" size="50px" margin="10px 0 20px 0"]Your Text...[/googlefont]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('googlefont', tinymce.plugins.googlefont);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Column 1/1
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.one_one', {  
        init : function(ed, url) {  
            ed.addButton('one_one', {  
                title : 'Add 1 Column',  
                image : url+'/one_one.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_one]Content here.[/one_one]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_one', tinymce.plugins.one_one);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Column 1/2
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.one_half', {  
        init : function(ed, url) {  
            ed.addButton('one_half', {  
                title : 'Add 1/2 Columns',  
                image : url+'/one_half.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_half]Content here.[/one_half] [one_half_last]Content here.[/one_half_last]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_half', tinymce.plugins.one_half);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Column 1/3
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.one_third', {  
        init : function(ed, url) {  
            ed.addButton('one_third', {  
                title : 'Add 1/3 Columns',  
                image : url+'/one_third.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_third]Content here.[/one_third] [one_third]Content here.[/one_third] [one_third_last]Content here.[/one_third_last]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_third', tinymce.plugins.one_third);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Column 2/3
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.two_third', {  
        init : function(ed, url) {  
            ed.addButton('two_third', {  
                title : 'Add 2/3 Columns',  
                image : url+'/two_third.png',  
                onclick : function() {  
                     ed.selection.setContent('[two_third]Content here.[/two_third] [one_third_last]Content here.[/one_third_last]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('two_third', tinymce.plugins.two_third);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Column 1/4
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.one_fourth', {  
        init : function(ed, url) {  
            ed.addButton('one_fourth', {  
                title : 'Add 1/4 Columns',  
                image : url+'/one_fourth.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_fourth]Content here.[/one_fourth] [one_fourth]Content here.[/one_fourth] [one_fourth]Content here.[/one_fourth] [one_fourth_last]Content here.[/one_fourth_last]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_fourth', tinymce.plugins.one_fourth);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Column 3/4
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.three_fourth', {  
        init : function(ed, url) {  
            ed.addButton('three_fourth', {  
                title : 'Add 3/4 Columns',  
                image : url+'/three_fourth.png',  
                onclick : function() {  
                     ed.selection.setContent('[three_fourth]Content here.[/three_fourth] [one_fourth_last]Content here.[/one_fourth_last]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('three_fourth', tinymce.plugins.three_fourth);  
})();


/*-----------------------------------------------------------------------------------*/
/*	Project Details
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.projectdetails', {  
        init : function(ed, url) {  
            ed.addButton('projectdetails', {  
                title : 'Add Project Details',  
                image : url+'/detail.png',  
                onclick : function() {  
                     ed.selection.setContent('[projectdetails open="2" detail="Project Details :"]<br />[detail-box title="Date"]22 April, 2013[/detail-box]<br />[detail-box title="Skills"]Photoshop, 3d Max, Blender[/detail-box]<br />[detail-box title="Client"]John Doe[/detail-box]<br />[detail-box title="Project Url"]http://www.somelink.com[/detail-box]<br />[/projectdetails]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('projectdetails', tinymce.plugins.projectdetails);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Icon Creator
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.icon', {  
        init : function(ed, url) {  
            ed.addButton('icon', {  
                title : 'Create New Icon',  
                image : url+'/icon.png',  
                onclick : function() {  
                     ed.selection.setContent('[icon icontype="icon-tools"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('icon', tinymce.plugins.icon);  
})();

/*-----------------------------------------------------------------------------------*/
/*	Slider
/*-----------------------------------------------------------------------------------*/
(function() {  
    tinymce.create('tinymce.plugins.slider', {  
        init : function(ed, url) {  
            ed.addButton('slider', {  
                title : 'Add a slider',  
                image : url+'/slider-icon2.png',  
                onclick : function() {  
                     ed.selection.setContent('[slider][slide link=""]image link[/slide][slide link=""]image link here[/slide][/slider]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('slider', tinymce.plugins.slider);  
})();
