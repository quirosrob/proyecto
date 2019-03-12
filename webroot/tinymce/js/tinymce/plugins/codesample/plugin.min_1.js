!function(e,t){"use strict";function n(e,t){for(var n,r=[],o=0;o<e.length;++o){if(n=a[e[o]]||i(e[o]),!n)throw"module definition dependecy not found: "+e[o];r.push(n)}t.apply(null,r)}function r(e,r,i){if("string"!=typeof e)throw"invalid module definition, module id must be defined and be a string";if(r===t)throw"invalid module definition, dependencies must be specified";if(i===t)throw"invalid module definition, definition function must be specified";n(r,function(){a[e]=i.apply(null,arguments)})}function i(t){for(var n=e,r=t.split(/[.\/]/),i=0;i<r.length;++i){if(!n[r[i]])return;n=n[r[i]]}return n}function o(n){var r,i,o,s,l;for(r=0;r<n.length;r++){i=e,o=n[r],s=o.split(/[.\/]/);for(var u=0;u<s.length-1;++u)i[s[u]]===t&&(i[s[u]]={}),i=i[s[u]];i[s[s.length-1]]=a[o]}if(e.AMDLC_TESTS){l=e.privateModules||{};for(o in a)l[o]=a[o];for(r=0;r<n.length;r++)delete l[n[r]];e.privateModules=l}}var a={};r("tinymce/codesampleplugin/Prism",[],function(){var e={},t="undefined"!=typeof e?e:"undefined"!=typeof WorkerGlobalScope&&self instanceof WorkerGlobalScope?self:{},n=function(){var e=/\blang(?:uage)?-(?!\*)(\w+)\b/i,n=t.Prism={util:{encode:function(e){return e instanceof r?new r(e.type,n.util.encode(e.content),e.alias):"Array"===n.util.type(e)?e.map(n.util.encode):e.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/\u00a0/g," ")},type:function(e){return Object.prototype.toString.call(e).match(/\[object (\w+)\]/)[1]},clone:function(e){var t=n.util.type(e);switch(t){case"Object":var r={};for(var i in e)e.hasOwnProperty(i)&&(r[i]=n.util.clone(e[i]));return r;case"Array":return e.map&&e.map(function(e){return n.util.clone(e)})}return e}},languages:{extend:function(e,t){var r=n.util.clone(n.languages[e]);for(var i in t)r[i]=t[i];return r},insertBefore:function(e,t,r,i){i=i||n.languages;var o=i[e];if(2==arguments.length){r=arguments[1];for(var a in r)r.hasOwnProperty(a)&&(o[a]=r[a]);return o}var s={};for(var l in o)if(o.hasOwnProperty(l)){if(l==t)for(var a in r)r.hasOwnProperty(a)&&(s[a]=r[a]);s[l]=o[l]}return n.languages.DFS(n.languages,function(t,n){n===i[e]&&t!=e&&(this[t]=s)}),i[e]=s},DFS:function(e,t,r){for(var i in e)e.hasOwnProperty(i)&&(t.call(e,i,e[i],r||i),"Object"===n.util.type(e[i])?n.languages.DFS(e[i],t):"Array"===n.util.type(e[i])&&n.languages.DFS(e[i],t,i))}},plugins:{},highlightAll:function(e,t){for(var r,i=document.querySelectorAll('code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code'),o=0;r=i[o++];)n.highlightElement(r,e===!0,t)},highlightElement:function(r,i,o){for(var a,s,l=r;l&&!e.test(l.className);)l=l.parentNode;l&&(a=(l.className.match(e)||[,""])[1],s=n.languages[a]),r.className=r.className.replace(e,"").replace(/\s+/g," ")+" language-"+a,l=r.parentNode,/pre/i.test(l.nodeName)&&(l.className=l.className.replace(e,"").replace(/\s+/g," ")+" language-"+a);var u=r.textContent,c={element:r,language:a,grammar:s,code:u};if(!u||!s)return void n.hooks.run("complete",c);if(n.hooks.run("before-highlight",c),i&&t.Worker){var d=new Worker(n.filename);d.onmessage=function(e){c.highlightedCode=e.data,n.hooks.run("before-insert",c),c.element.innerHTML=c.highlightedCode,o&&o.call(c.element),n.hooks.run("after-highlight",c),n.hooks.run("complete",c)},d.postMessage(JSON.stringify({language:c.language,code:c.code,immediateClose:!0}))}else c.highlightedCode=n.highlight(c.code,c.grammar,c.language),n.hooks.run("before-insert",c),c.element.innerHTML=c.highlightedCode,o&&o.call(r),n.hooks.run("after-highlight",c),n.hooks.run("complete",c)},highlight:function(e,t,i){var o=n.tokenize(e,t);return r.stringify(n.util.encode(o),i)},tokenize:function(e,t,r){var i=n.Token,o=[e],a=t.rest;if(a){for(var s in a)t[s]=a[s];delete t.rest}e:for(var s in t)if(t.hasOwnProperty(s)&&t[s]){var l=t[s];l="Array"===n.util.type(l)?l:[l];for(var u=0;u<l.length;++u){var c=l[u],d=c.inside,f=!!c.lookbehind,p=0,h=c.alias;c=c.pattern||c;for(var m=0;m<o.length;m++){var g=o[m];if(o.length>e.length)break e;if(!(g instanceof i)){c.lastIndex=0;var v=c.exec(g);if(v){f&&(p=v[1].length);var y=v.index-1+p,v=v[0].slice(p),b=v.length,C=y+b,x=g.slice(0,y+1),w=g.slice(C+1),E=[m,1];x&&E.push(x);var N=new i(s,d?n.tokenize(v,d):v,h);E.push(N),w&&E.push(w),Array.prototype.splice.apply(o,E)}}}}}return o},hooks:{all:{},add:function(e,t){var r=n.hooks.all;r[e]=r[e]||[],r[e].push(t)},run:function(e,t){var r=n.hooks.all[e];if(r&&r.length)for(var i,o=0;i=r[o++];)i(t)}}},r=n.Token=function(e,t,n){this.type=e,this.content=t,this.alias=n};if(r.stringify=function(e,t,i){if("string"==typeof e)return e;if("Array"===n.util.type(e))return e.map(function(n){return r.stringify(n,t,e)}).join("");var o={type:e.type,content:r.stringify(e.content,t,i),tag:"span",classes:["token",e.type],attributes:{},language:t,parent:i};if("comment"==o.type&&(o.attributes.spellcheck="true"),e.alias){var a="Array"===n.util.type(e.alias)?e.alias:[e.alias];Array.prototype.push.apply(o.classes,a)}n.hooks.run("wrap",o);var s="";for(var l in o.attributes)s+=(s?" ":"")+l+'="'+(o.attributes[l]||"")+'"';return"<"+o.tag+' class="'+o.classes.join(" ")+'" '+s+">"+o.content+"</"+o.tag+">"},!t.document)return t.addEventListener?(t.addEventListener("message",function(e){var r=JSON.parse(e.data),i=r.language,o=r.code,a=r.immediateClose;t.postMessage(n.highlight(o,n.languages[i],i)),a&&t.close()},!1),t.Prism):t.Prism}();return"undefined"!=typeof module&&module.exports&&(module.exports=n),"undefined"!=typeof global&&(global.Prism=n),n.languages.markup={comment:/<!--[\w\W]*?-->/,prolog:/<\?[\w\W]+?\?>/,doctype:/<!DOCTYPE[\w\W]+?>/,cdata:/<!\[CDATA\[[\w\W]*?]]>/i,tag:{pattern:/<\/?[^\s>\/=.]+(?:\s+[^\s>\/=]+(?:=(?:("|')(?:\\\1|\\?(?!\1)[\w\W])*\1|[^\s'">=]+))?)*\s*\/?>/i,inside:{tag:{pattern:/^<\/?[^\s>\/]+/i,inside:{punctuation:/^<\/?/,namespace:/^[^\s>\/:]+:/}},"attr-value":{pattern:/=(?:('|")[\w\W]*?(\1)|[^\s>]+)/i,inside:{punctuation:/[=>"']/}},punctuation:/\/?>/,"attr-name":{pattern:/[^\s>\/]+/,inside:{namespace:/^[^\s>\/:]+:/}}}},entity:/&#?[\da-z]{1,8};/i},n.hooks.add("wrap",function(e){"entity"===e.type&&(e.attributes.title=e.content.replace(/&amp;/,"&"))}),n.languages.xml=n.languages.markup,n.languages.html=n.languages.markup,n.languages.mathml=n.languages.markup,n.languages.svg=n.languages.markup,n.languages.css={comment:/\/\*[\w\W]*?\*\//,atrule:{pattern:/@[\w-]+?.*?(;|(?=\s*\{))/i,inside:{rule:/@[\w-]+/}},url:/url\((?:(["'])(\\(?:\r\n|[\w\W])|(?!\1)[^\\\r\n])*\1|.*?)\)/i,selector:/[^\{\}\s][^\{\};]*?(?=\s*\{)/,string:/("|')(\\(?:\r\n|[\w\W])|(?!\1)[^\\\r\n])*\1/,property:/(\b|\B)[\w-]+(?=\s*:)/i,important:/\B!important\b/i,"function":/[-a-z0-9]+(?=\()/i,punctuation:/[(){};:]/},n.languages.css.atrule.inside.rest=n.util.clone(n.languages.css),n.languages.markup&&(n.languages.insertBefore("markup","tag",{style:{pattern:/<style[\w\W]*?>[\w\W]*?<\/style>/i,inside:{tag:{pattern:/<style[\w\W]*?>|<\/style>/i,inside:n.languages.markup.tag.inside},rest:n.languages.css},alias:"language-css"}}),n.languages.insertBefore("inside","attr-value",{"style-attr":{pattern:/\s*style=("|').*?\1/i,inside:{"attr-name":{pattern:/^\s*style/i,inside:n.languages.markup.tag.inside},punctuation:/^\s*=\s*['"]|['"]\s*$/,"attr-value":{pattern:/.+/i,inside:n.languages.css}},alias:"language-css"}},n.languages.markup.tag)),n.languages.clike={comment:[{pattern:/(^|[^\\])\/\*[\w\W]*?\*\//,lookbehind:!0},{pattern:/(^|[^\\:])\/\/.*/,lookbehind:!0}],string:/(["'])(\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/,"class-name":{pattern:/((?:\b(?:class|interface|extends|implements|trait|instanceof|new)\s+)|(?:catch\s+\())[a-z0-9_\.\\]+/i,lookbehind:!0,inside:{punctuation:/(\.|\\)/}},keyword:/\b(if|else|while|do|for|return|in|instanceof|function|new|try|throw|catch|finally|null|break|continue)\b/,"boolean":/\b(true|false)\b/,"function":/[a-z0-9_]+(?=\()/i,number:/\b-?(?:0x[\da-f]+|\d*\.?\d+(?:e[+-]?\d+)?)\b/i,operator:/--?|\+\+?|!=?=?|<=?|>=?|==?=?|&&?|\|\|?|\?|\*|\/|~|\^|%/,punctuation:/[{}[\];(),.:]/},n.languages.javascript=n.languages.extend("clike",{keyword:/\b(as|async|await|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|false|finally|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|true|try|typeof|var|void|while|with|yield)\b/,number:/\b-?(0x[\dA-Fa-f]+|0b[01]+|0o[0-7]+|\d*\.?\d+([Ee][+-]?\d+)?|NaN|Infinity)\b/,"function":/[_$a-zA-Z\xA0-\uFFFF][_$a-zA-Z0-9\xA0-\uFFFF]*(?=\()/i}),n.languages.insertBefore("javascript","keyword",{regex:{pattern:/(^|[^\/])\/(?!\/)(\[.+?]|\\.|[^\/\\\r\n])+\/[gimyu]{0,5}(?=\s*($|[\r\n,.;})]))/,lookbehind:!0}}),n.languages.insertBefore("javascript","class-name",{"template-string":{pattern:/`(?:\\`|\\?[^`])*`/,inside:{interpolation:{pattern:/\$\{[^}]+\}/,inside:{"interpolation-punctuation":{pattern:/^\$\{|\}$/,alias:"punctuation"},rest:n.languages.javascript}},string:/[\s\S]+/}}}),n.languages.markup&&n.languages.insertBefore("markup","tag",{script:{pattern:/<script[\w\W]*?>[\w\W]*?<\/script>/i,inside:{tag:{pattern:/<script[\w\W]*?>|<\/script>/i,inside:n.languages.markup.tag.inside},rest:n.languages.javascript},alias:"language-javascript"}}),n.languages.js=n.languages.javascript,n.languages.c=n.languages.extend("clike",{keyword:/\b(asm|typeof|inline|auto|break|case|char|const|continue|default|do|double|else|enum|extern|float|for|goto|if|int|long|register|return|short|signed|sizeof|static|struct|switch|typedef|union|unsigned|void|volatile|while)\b/,operator:/\-[>-]?|\+\+?|!=?|<<?=?|>>?=?|==?|&&?|\|?\||[~^%?*\/]/,number:/\b-?(?:0x[\da-f]+|\d*\.?\d+(?:e[+-]?\d+)?)[ful]*\b/i}),n.languages.insertBefore("c","string",{macro:{pattern:/(^\s*)#\s*[a-z]+([^\r\n\\]|\\.|\\(?:\r\n?|\n))*/im,lookbehind:!0,alias:"property",inside:{string:{pattern:/(#\s*include\s*)(<.+?>|("|')(\\?.)+?\3)/,lookbehind:!0}}}}),delete n.languages.c["class-name"],delete n.languages.c["boolean"],n.languages.csharp=n.languages.extend("clike",{keyword:/\b(abstract|as|async|await|base|bool|break|byte|case|catch|char|checked|class|const|continue|decimal|default|delegate|do|double|else|enum|event|explicit|extern|false|finally|fixed|float|for|foreach|goto|if|implicit|in|int|interface|internal|is|lock|long|namespace|new|null|object|operator|out|override|params|private|protected|public|readonly|ref|return|sbyte|sealed|short|sizeof|stackalloc|static|string|struct|switch|this|throw|true|try|typeof|uint|ulong|unchecked|unsafe|ushort|using|virtual|void|volatile|while|add|alias|ascending|async|await|descending|dynamic|from|get|global|group|into|join|let|orderby|partial|remove|select|set|value|var|where|yield)\b/,string:[/@("|')(\1\1|\\\1|\\?(?!\1)[\s\S])*\1/,/("|')(\\?.)*?\1/],number:/\b-?(0x[\da-f]+|\d*\.?\d+)\b/i}),n.languages.insertBefore("csharp","keyword",{preprocessor:{pattern:/(^\s*)#.*/m,lookbehind:!0}}),n.languages.cpp=n.languages.extend("c",{keyword:/\b(alignas|alignof|asm|auto|bool|break|case|catch|char|char16_t|char32_t|class|compl|const|constexpr|const_cast|continue|decltype|default|delete|do|double|dynamic_cast|else|enum|explicit|export|extern|float|for|friend|goto|if|inline|int|long|mutable|namespace|new|noexcept|nullptr|operator|private|protected|public|register|reinterpret_cast|return|short|signed|sizeof|static|static_assert|static_cast|struct|switch|template|this|thread_local|throw|try|typedef|typeid|typename|union|unsigned|using|virtual|void|volatile|wchar_t|while)\b/,"boolean":/\b(true|false)\b/,operator:/[-+]{1,2}|!=?|<{1,2}=?|>{1,2}=?|\->|:{1,2}|={1,2}|\^|~|%|&{1,2}|\|?\||\?|\*|\/|\b(and|and_eq|bitand|bitor|not|not_eq|or|or_eq|xor|xor_eq)\b/}),n.languages.insertBefore("cpp","keyword",{"class-name":{pattern:/(class\s+)[a-z0-9_]+/i,lookbehind:!0}}),n.languages.java=n.languages.extend("clike",{keyword:/\b(abstract|continue|for|new|switch|assert|default|goto|package|synchronized|boolean|do|if|private|this|break|double|implements|protected|throw|byte|else|import|public|throws|case|enum|instanceof|return|transient|catch|extends|int|short|try|char|final|interface|static|void|class|finally|long|strictfp|volatile|const|float|native|super|while)\b/,number:/\b0b[01]+\b|\b0x[\da-f]*\.?[\da-fp\-]+\b|\b\d*\.?\d+(?:e[+-]?\d+)?[df]?\b/i,operator:{pattern:/(^|[^.])(?:\+[+=]?|-[-=]?|!=?|<<?=?|>>?>?=?|==?|&[&=]?|\|[|=]?|\*=?|\/=?|%=?|\^=?|[?:~])/m,lookbehind:!0}}),n.languages.php=n.languages.extend("clike",{keyword:/\b(and|or|xor|array|as|break|case|cfunction|class|const|continue|declare|default|die|do|else|elseif|enddeclare|endfor|endforeach|endif|endswitch|endwhile|extends|for|foreach|function|include|include_once|global|if|new|return|static|switch|use|require|require_once|var|while|abstract|interface|public|implements|private|protected|parent|throw|null|echo|print|trait|namespace|final|yield|goto|instanceof|finally|try|catch)\b/i,constant:/\b[A-Z0-9_]{2,}\b/,comment:{pattern:/(^|[^\\])(?:\/\*[\w\W]*?\*\/|\/\/.*)/,lookbehind:!0}}),n.languages.insertBefore("php","class-name",{"shell-comment":{pattern:/(^|[^\\])#.*/,lookbehind:!0,alias:"comment"}}),n.languages.insertBefore("php","keyword",{delimiter:/\?>|<\?(?:php)?/i,variable:/\$\w+\b/i,"package":{pattern:/(\\|namespace\s+|use\s+)[\w\\]+/,lookbehind:!0,inside:{punctuation:/\\/}}}),n.languages.insertBefore("php","operator",{property:{pattern:/(->)[\w]+/,lookbehind:!0}}),n.languages.markup&&(n.hooks.add("before-highlight",function(e){"php"===e.language&&(e.tokenStack=[],e.backupCode=e.code,e.code=e.code.replace(/(?:<\?php|<\?)[\w\W]*?(?:\?>)/gi,function(t){return e.tokenStack.push(t),"{{{PHP"+e.tokenStack.length+"}}}"}))}),n.hooks.add("before-insert",function(e){"php"===e.language&&(e.code=e.backupCode,delete e.backupCode)}),n.hooks.add("after-highlight",function(e){if("php"===e.language){for(var t,r=0;t=e.tokenStack[r];r++)e.highlightedCode=e.highlightedCode.replace("{{{PHP"+(r+1)+"}}}",n.highlight(t,e.grammar,"php").replace(/\$/g,"$$$$"));e.element.innerHTML=e.highlightedCode}}),n.hooks.add("wrap",function(e){"php"===e.language&&"markup"===e.type&&(e.content=e.content.replace(/(\{\{\{PHP[0-9]+\}\}\})/g,'<span class="token php">$1</span>'))}),n.languages.insertBefore("php","comment",{markup:{pattern:/<[^?]\/?(.*?)>/,inside:n.languages.markup},php:/\{\{\{PHP[0-9]+\}\}\}/})),n.languages.python={comment:{pattern:/(^|[^\\])#.*/,lookbehind:!0},string:/"""[\s\S]+?"""|'''[\s\S]+?'''|("|')(?:\\?.)*?\1/,"function":{pattern:/((?:^|\s)def[ \t]+)[a-zA-Z_][a-zA-Z0-9_]*(?=\()/g,lookbehind:!0},"class-name":{pattern:/(\bclass\s+)[a-z0-9_]+/i,lookbehind:!0},keyword:/\b(?:as|assert|async|await|break|class|continue|def|del|elif|else|except|exec|finally|for|from|global|if|import|in|is|lambda|pass|print|raise|return|try|while|with|yield)\b/,"boolean":/\b(?:True|False)\b/,number:/\b-?(?:0[bo])?(?:(?:\d|0x[\da-f])[\da-f]*\.?\d*|\.\d+)(?:e[+-]?\d+)?j?\b/i,operator:/[-+%=]=?|!=|\*\*?=?|\/\/?=?|<[<=>]?|>[=>]?|[&|^~]|\b(?:or|and|not)\b/,punctuation:/[{}[\];(),.:]/},function(e){e.languages.ruby=e.languages.extend("clike",{comment:/#(?!\{[^\r\n]*?\}).*/,keyword:/\b(alias|and|BEGIN|begin|break|case|class|def|define_method|defined|do|each|else|elsif|END|end|ensure|false|for|if|in|module|new|next|nil|not|or|raise|redo|require|rescue|retry|return|self|super|then|throw|true|undef|unless|until|when|while|yield)\b/});var t={pattern:/#\{[^}]+\}/,inside:{delimiter:{pattern:/^#\{|\}$/,alias:"tag"},rest:e.util.clone(e.languages.ruby)}};e.languages.insertBefore("ruby","keyword",{regex:[{pattern:/%r([^a-zA-Z0-9\s\{\(\[<])(?:[^\\]|\\[\s\S])*?\1[gim]{0,3}/,inside:{interpolation:t}},{pattern:/%r\((?:[^()\\]|\\[\s\S])*\)[gim]{0,3}/,inside:{interpolation:t}},{pattern:/%r\{(?:[^#{}\\]|#(?:\{[^}]+\})?|\\[\s\S])*\}[gim]{0,3}/,inside:{interpolation:t}},{pattern:/%r\[(?:[^\[\]\\]|\\[\s\S])*\][gim]{0,3}/,inside:{interpolation:t}},{pattern:/%r<(?:[^<>\\]|\\[\s\S])*>[gim]{0,3}/,inside:{interpolation:t}},{pattern:/(^|[^\/])\/(?!\/)(\[.+?]|\\.|[^\/\r\n])+\/[gim]{0,3}(?=\s*($|[\r\n,.;})]))/,lookbehind:!0}],variable:/[@$]+[a-zA-Z_][a-zA-Z_0-9]*(?:[?!]|\b)/,symbol:/:[a-zA-Z_][a-zA-Z_0-9]*(?:[?!]|\b)/}),e.languages.insertBefore("ruby","number",{builtin:/\b(Array|Bignum|Binding|Class|Continuation|Dir|Exception|FalseClass|File|Stat|File|Fixnum|Fload|Hash|Integer|IO|MatchData|Method|Module|NilClass|Numeric|Object|Proc|Range|Regexp|String|Struct|TMS|Symbol|ThreadGroup|Thread|Time|TrueClass)\b/,constant:/\b[A-Z][a-zA-Z_0-9]*(?:[?!]|\b)/}),e.languages.ruby.string=[{pattern:/%[qQiIwWxs]?([^a-zA-Z0-9\s\{\(\[<])(?:[^\\]|\\[\s\S])*?\1/,inside:{interpolation:t}},{pattern:/%[qQiIwWxs]?\((?:[^()\\]|\\[\s\S])*\)/,inside:{interpolation:t}},{pattern:/%[qQiIwWxs]?\{(?:[^#{}\\]|#(?:\{[^}]+\})?|\\[\s\S])*\}/,inside:{interpolation:t}},{pattern:/%[qQiIwWxs]?\[(?:[^\[\]\\]|\\[\s\S])*\]/,inside:{interpolation:t}},{pattern:/%[qQiIwWxs]?<(?:[^<>\\]|\\[\s\S])*>/,inside:{interpolation:t}},{pattern:/("|')(#\{[^}]+\}|\\(?:\r?\n|\r)|\\?.)*?\1/,inside:{interpolation:t}}]}(n),n}),r("tinymce/codesampleplugin/Utils",[],function(){function e(e){return e&&"PRE"==e.nodeName&&e.className.indexOf("language-")!==-1}function t(e){return function(t,n){return e(n)}}return{isCodeSample:e,trimArg:t}}),r("tinymce/codesampleplugin/Dialog",["tinymce/dom/DOMUtils","tinymce/codesampleplugin/Utils","tinymce/codesampleplugin/Prism"],function(e,t,n){function r(e){var t=[{text:"HTML/XML",value:"markup"},{text:"JavaScript",value:"javascript"},{text:"CSS",value:"css"},{text:"PHP",value:"php"},{text:"Ruby",value:"ruby"},{text:"Python",value:"python"},{text:"Java",value:"java"},{text:"C",value:"c"},{text:"C#",value:"csharp"},{text:"C++",value:"cpp"}],n=e.settings.codesample_languages;return n?n:t}function i(e,t,r){e.undoManager.transact(function(){var i=o(e);r=l.encode(r),i?(e.dom.setAttrib(i,"class","language-"+t),i.innerHTML=r,n.highlightElement(i),e.selection.select(i)):(e.insertContent('<pre id="__new" class="language-'+t+'">'+r+"</pre>"),e.selection.select(e.$("#__new").removeAttr("id")[0]))})}function o(e){var n=e.selection.getNode();return t.isCodeSample(n)?n:null}function a(e){var t=o(e);return t?t.textContent:""}function s(e){var t,n=o(e);return n?(t=n.className.match(/language-(\w+)/),t?t[1]:""):""}var l=e.DOM;return{open:function(e){e.windowManager.open({title:"Insert/Edit code sample",minWidth:Math.min(l.getViewPort().w,e.getParam("codesample_dialog_width",800)),minHeight:Math.min(l.getViewPort().h,e.getParam("codesample_dialog_height",650)),layout:"flex",direction:"column",align:"stretch",body:[{type:"listbox",name:"language",label:"Language",maxWidth:200,value:s(e),values:r(e)},{type:"textbox",name:"code",multiline:!0,spellcheck:!1,ariaLabel:"Code view",flex:1,style:"direction: ltr; text-align: left",classes:"monospace",value:a(e),autofocus:!0}],onSubmit:function(t){i(e,t.data.language,t.data.code)}})}}}),r("tinymce/codesampleplugin/Plugin",["tinymce/Env","tinymce/PluginManager","tinymce/codesampleplugin/Prism","tinymce/codesampleplugin/Dialog","tinymce/codesampleplugin/Utils"],function(e,t,n,r,i){var o,a=i.trimArg;t.add("codesample",function(t,s){function l(){var e,n=t.settings.codesample_content_css;t.inline&&o||!t.inline&&u||(t.inline?o=!0:u=!0,n!==!1&&(e=t.dom.create("link",{rel:"stylesheet",href:n?n:s+"/css/prism.css"}),t.getDoc().getElementsByTagName("head")[0].appendChild(e)))}var u,c=t.$;e.ceFalse&&(t.on("PreProcess",function(e){c("pre[contenteditable=false]",e.node).filter(a(i.isCodeSample)).each(function(e,t){var n=c(t),r=t.textContent;n.attr("class",c.trim(n.attr("class"))),n.removeAttr("contentEditable"),n.empty().append(c("<code></code>").each(function(){this.textContent=r}))})}),t.on("SetContent",function(){var e=c("pre").filter(a(i.isCodeSample)).filter(function(e,t){return"false"!==t.contentEditable});e.length&&t.undoManager.transact(function(){e.each(function(e,r){c(r).find("br").each(function(e,n){n.parentNode.replaceChild(t.getDoc().createTextNode("\n"),n)}),r.contentEditable=!1,r.innerHTML=t.dom.encode(r.textContent),n.highlightElement(r),r.className=c.trim(r.className)})})}),t.addCommand("codesample",function(){var e=t.selection.getNode();t.selection.isCollapsed()||i.isCodeSample(e)?r.open(t):t.formatter.toggle("code")}),t.addButton("codesample",{cmd:"codesample",title:"Insert/Edit code sample"}),t.on("init",l))})}),o(["tinymce/codesampleplugin/Prism","tinymce/codesampleplugin/Utils","tinymce/codesampleplugin/Dialog","tinymce/codesampleplugin/Plugin"])}(window);