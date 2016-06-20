<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Board
 *
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Term[] $terms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 */
	class Board extends \Eloquent {}
}

namespace App{
/**
 * App\Tag
 *
 * @property-read \App\Board $boards
 */
	class Tag extends \Eloquent {}
}

namespace App{
/**
 * App\Term
 *
 * @property-read \App\Board $boards
 */
	class Term extends \Eloquent {}
}

namespace App{
/**
 * App\UploadFile
 *
 */
	class UploadFile extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

