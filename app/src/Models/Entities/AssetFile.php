<?php
namespace Models\Entities;

class AssetFile extends BaseEntity {


	protected $table = 'asset_files';

	public function asset()
    {
        return $this->belongsTo('Asset', 'assetId');
    }
}
