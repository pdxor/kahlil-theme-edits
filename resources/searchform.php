<form role="search" method="get" class="search-form" action="<?=home_url( '/' )?>">
		<div class="form-group">
			<div class="input-group input-group-sm">
			<label class="control-label sr-only" for="SDSSearch"><?=__('Search for Safety Data Sheets', 'microcare-theme')?></label>
				<input name="s" class="form-control" type="text" id="SDSSearch" placeholder="<?=__('Search', 'microcare-theme')?> <?=get_bloginfo('name')?> <?=__('for Safety Data Sheets by product name or number', 'microcare-theme')?>">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary" value="<?=__('GO', 'microcare-theme')?>" /><i class="fa fa-search" aria-hidden="true"></i></button>
				 </span>
			</div>
    </div>
    <input type="hidden" name="post_type" value="product" />
		<input type="hidden" class="search-submit" value="Search" />
</form>
