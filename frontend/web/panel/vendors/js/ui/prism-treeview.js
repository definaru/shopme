Prism.languages.treeview = {
	"treeview-part": {
		pattern: /(^|\n).+/,
		inside: {
			"entry-line": [
				{
					pattern: /\|-- |в”њв”Ђв”Ђ /,
					alias: "line-h"
				},
				{
					pattern: /\|   |в”‚   /,
					alias: "line-v"
				},
				{
					pattern: /`-- |в””в”Ђв”Ђ /,
					alias: "line-v-last"
				},
				{
					pattern: / {4}/,
					alias: "line-v-gap"
				}
			],
			"entry-name": {
				pattern: /.*\S.*/,
				inside: {
					// symlink
					"operator": / -> /,
				}
			}
		}
	}
};

Prism.hooks.add('wrap', function(env) {
	if (env.language === 'treeview') {
		// Remove line breaks
		if(env.type === 'treeview-part') {
			env.content = env.content.replace(/\n/g,'')+'<br />';
		}
		if(env.type === 'entry-name') {
			if(/(^|[^\\])\/\s*$/.test(env.content)) {
				env.content = env.content.slice(0,-1);
				// This is a folder
				env.classes.push('dir');
			} else {

				if(/(^|[^\\])[=*|]\s*$/.test(env.content)) {
					env.content = env.content.slice(0,-1);
				}
				
				var parts = env.content.toLowerCase().split('.');
				while (parts.length > 1) {
					parts.shift();
					// Ex. 'foo.min.js' would become '<span class="token keyword ext-min-js ext-js">foo.min.js</span>'
					env.classes.push('ext-' + parts.join('-'));
				}
			}

			if(env.content.charAt(0)==='.') {
				env.classes.push('dotfile');
			}
		}
	}
});