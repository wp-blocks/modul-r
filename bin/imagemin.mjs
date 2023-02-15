import imagemin from 'imagemin';
import imageminAvif from 'imagemin-avif';
import imageminSvgo from 'imagemin-svgo';
import imageminMozjpeg from 'imagemin-mozjpeg';

import { promises as fsPromises } from 'node:fs';
import { promisify } from 'node:util';
import path from 'node:path';
import fs from 'graceful-fs';

const writeFile = promisify(fs.writeFile);

const srcdir = './src/img';
const distdir = './build/img';

// Using imagemin to compress jpeg and png images to avif.
imagemin([srcdir + '/**/*.{jpg,jpeg,png}'], {
	plugins: [
		imageminAvif({quality: 50})
	]
}).then( (files) =>
	files.forEach(async (v) => {
		let source = path.parse(v.sourcePath);
		v.destinationPath = `${source.dir.replace(srcdir, distdir)}/${source.name}.avif`;
		console.log(source.base +' -> ' + v.destinationPath);
		await fsPromises.mkdir(path.dirname(v.destinationPath), { recursive: true });
		await writeFile(v.destinationPath, v.data);
	})
);

// Using imagemin to minify jpeg and svg images.
imagemin([srcdir + '/**/*.{jpg,jpeg,svg}'], {
	plugins: [
		imageminSvgo({
			plugins: [{
				name: 'removeViewBox',
				active: false
			}]
		}),
		imageminMozjpeg()
	]
}).then(files => files
	.forEach(async v => {
		let source = path.parse(v.sourcePath);
		v.destinationPath = `${source.dir.replace(srcdir, distdir)}/${source.base}`;
		console.log(source.base +' -> ' + v.destinationPath);
		await fsPromises.mkdir(path.dirname(v.destinationPath), { recursive: true });
		await writeFile(v.destinationPath, v.data);
	})
);
