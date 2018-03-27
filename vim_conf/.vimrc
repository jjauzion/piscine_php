syntax on
set relativenumber number
set showcmd
inoremap jk <esc>

if has("autocmd")
	augroup templates
		autocmd BufNewFile *.html 0r ~/.vim/templates/skeleton.html
	augroup END
endif

if has("autocmd")
	augroup templates
		autocmd BufNewFile *.php 0r ~/.vim/templates/skeleton.php
	augroup END
endif
