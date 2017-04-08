/* 
	USP Pro JavaScript by Jeff Starr, Monzilla Media.
	Copyright 2015 Monzilla Media, All Rights Reserved.
	Read Only License for USP Pro, All Other Use Prohibited.
*/

jQuery(document).ready(function($) {
	
	// "Add another" link : [usp_files method="" multiple="true"]
	$('.usp-files').each(function(index, value) { 
		var id = '#'+ $(this).attr('id');
		var n = parseInt($(id +' .usp-file-count').val());
		var x = parseInt($(id +' .usp-file-limit').val());
		if (x == 1) {
			$(id +' .usp-add-another').hide();
		} else {
			$(id +' .usp-add-another').click(function(event) {
				event.preventDefault();
				n++;
				var $this = $(this);
				var $new = $this.parent().find('input:visible:last').clone().val('').attr('data-file', n).addClass('usp-clone');
				$('#usp-file-count').val(n);
				if (n < x) {
					$this.before($new.fadeIn(300));
				} else if (n = x) {
					$this.before($new.fadeIn(300));
					$this.hide();
				} else {
					$this.hide();
				}
			});
		}
	});
	
	// Preview selected images : [usp_files method="select" multiple="true"]
	$('.select-file.multiple').each(function(index, value) {
		$(this).on('change', function(event) {
			
			var any_window = window.URL || window.webkitURL;
			var div = '#'+ $(this).parent().parent().attr('id');
			var dom = $('#'+ $(this).attr('id'))[0];
			var files = dom.files;
			
			var preview = $(div +' input[name*="-preview"]').val();
			if (preview) return false;
			
			$(div +'.usp-preview').empty();
			
			for (var i = 0; i < files.length; i++) {
				var file_id = i + 1;
				var file_url = any_window.createObjectURL(files[i]);
				var file_ext = files[i].name.split('.')[files[i].name.split('.').length - 1].toLowerCase();
				var file_css = get_icon_url(file_url, file_ext);
				
				var append = true;
				var file_prv = $(div +' + .usp-preview .usp-preview-'+ file_id);
				if ($(file_prv).length) append = false;
				
				append_preview(div, file_id, file_url, file_css, append);
				window.URL.revokeObjectURL(files[i]);
			}
		});
	});
	
	// Preview selected images : [usp_files method="select" multiple="false"]
	$(document.body).on('change', '.select-file.single-file', function(event){
		var div_id = '#'+ $(this).parent().attr('id');
		var file_id = 1;
		
		var preview = $(div_id +' input[name*="-preview"]').val();
		if (preview) return false;
		
		if ($(this).val()) previewFiles(event, div_id, file_id);
	});
	
	// Preview selected images : [usp_files method="" multiple="false"]
	$(document.body).on('change', '.add-another.single-file', function(event){
		var div_id = '#'+ $(this).parent().attr('id');
		var file_id = 1;
		
		var preview = $(div_id +' input[name*="-preview"]').val();
		if (preview) return false;
		
		if ($(this).val()) previewFiles(event, div_id, file_id);
	});
	
	// Preview selected images : [usp_files method=""  multiple="true"]
	$(document.body).on('change', '.add-another.multiple', function(event){
		var div_id = '#'+ $(this).parent().parent().attr('id');
		var file_id = $(this).data('file');
		
		var preview = $(div_id +' input[name*="-preview"]').val();
		if (preview) return false;
		
		if ($(this).val()) previewFiles(event, div_id, file_id);
	});
	
	function previewFiles(event, div_id, file_id) {
		var files = event.target.files;
		var file_name = files[0].name;
		var any_window = window.URL || window.webkitURL;
		
		var file_url = any_window.createObjectURL(files[0]);
		var file_ext = file_name.split('.')[file_name.split('.').length - 1].toLowerCase();
		var file_css = get_icon_url(file_url, file_ext);
		
		var append = true;
		var file_prv = $(div_id +' + .usp-preview .usp-preview-'+ file_id);
		if ($(file_prv).length) append = false;
		
		append_preview(div_id, file_id, file_url, file_css, append);
	}
	
	function append_preview(div_id, file_id, file_url, file_css, append) {
		
		var prv_box = div_id +' + .usp-preview';
		var prv_file = div_id +' + .usp-preview .usp-preview-'+ file_id;
		
		var content = '<div class="usp-preview-'+ file_id +'"><a href="'+ file_url +'" title="Preview of file #'+ file_id +'" target="_blank"></a></div>';
		var styles = { 'background-image':'url('+ file_css +')', 'background-size':'cover', 'background-repeat':'no-repeat', 'background-position':'center center' };
		
		if (append == true) $(prv_box).append(content);
		else $(prv_file).replaceWith(content);
		
		$(prv_file).css(styles);
	}
	
	function get_icon_url(file_url, file_ext) {
		var url = '';
		if ($.inArray(file_ext, ['bmp','gif','jpe','jpeg','jpg','png','svg','tif','tiff']) > -1) {
			url = file_url;
			
		} else if ($.inArray(file_ext, ['3gp','avi','flv','mov','mp4','mpg','qt','swf','wmv']) > -1) {
			url = get_video_icon();
			
		} else if ($.inArray(file_ext, ['aac','aiff','alac','ape','flac','mid','mp3','ogg','wav','wma']) > -1) {
			url = get_audio_icon();
			
		} else if ($.inArray(file_ext, ['zip','rar']) > -1) {
			url = get_zip_icon();
			
		} else if ($.inArray(file_ext, ['pdf']) > -1) {
			url = get_pdf_icon();
		} else {
			url = get_other_icon();
		}
		return url;
	}
	
	function get_video_icon() {
		return 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAYEBQYFBAYGBQYHBwYIChAKCgkJChQODwwQFxQYGBcUFhYaHSUfGhsjHBYWICwgIyYnKSopGR8tMC0oMCUoKSj/2wBDAQcHBwoIChMKChMoGhYaKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCj/wAARCAAyAGQDASIAAhEBAxEB/8QAHAABAAIDAQEBAAAAAAAAAAAAAAUHAgYIBAED/8QAOhAAAAYBAQQFCgMJAAAAAAAAAAECAwQFEQYSEyExBxZBUWEIFCIyQlNxkZTSV6GxFSMlJjdHcoHw/8QAGgEBAAMBAQEAAAAAAAAAAAAAAAECBAUDBv/EACERAAICAQQCAwAAAAAAAAAAAAABAgMEERIUURUxIaGx/9oADAMBAAIRAxEAPwDqkAAAAAUh5S+qrLTHVzzaRITWS1vNy2Yr6mHlkRIwaXEnlJlk8dmeZGQAu1biEGklrSk1HgiM8ZEYrUdMm1VWHZxP2iksnG3pbz5Dn/TaKfWsluvtNSt6lpGY/nO9nQnUTq0sZwqWjZQkyx7R8Rseny0O9puzkXOqZt7p2Eo22Z1o1skwZeyzI2CW4fwMwBY69dVfnb8FBOt2jfqRJafNlPf4GvBGISb0iuG61XtRmKq+WrCIVwo2yf8ABpxOUqMeYpWg29F17dqUifVyFkcNq1bdkPvHwwaEOEazL4FgbKeqdPQJ9dUNEZWC2y3MJmMpTjKMF6yUl+7LGOeOQAhq2/1Fc38eOmLOp3Yy0nLiyoJuRnkdu7kp4ZxxIhYY1qNregl2kyDFnE8uGnalPIQZsseC3cbBH4ZGykeSIy5GAAAAAAAAAAAAAoXyr4irCv0lAb3aXJVgppLik8UZSXbzIu/AvoUp5RxbVp0ep77gi/IhaCTkkysnomylk9Hl8iCqC3axG4S1JW7HQlaW3jTyNxJcF/7EpN05q+dZV82ZdVz669JJhsrikcdjHI0s7OwR+OMi2vMy7hk3BI8ZLOTwRGPofH43X2crl29lZUlRq+FqGbbyb1iRYTE7C5biDU62Xc2Zl6BcfZwPYnTt7EqpsCHboZamqNUl1BqJ9/PYt31zLwyLNsKN+CvZksluzPBONlw/74iPdiKI8dhcBWODizWsf0nl2r2VDqiPa1NTSQ7CbGco2Z7DRQI7ZttrNSi4uERFt8j9bI7GIsFghyn00MbjTVa52lbRv1UOrBys6qFNu2Ho3Y1krIbpAAAYzQAAAAAAAAUv5RBZu+jku+7SX5ELoFReUFVXEvqjZ0lW7ZnVWZSXo7KiJak44Yz4ljwExejTIl8polDjjJDBejn2TyQ0jrxqvP8ATS4+pR9oddtWH/bO5+pR9o7HMh2cvj2dFj2MyTNyhZ7tg/YSfP494jFx9oz4cxpfXbVv4Z3P1KPtDrtq38M7j6lH2isMqqC0iw8ex+0RPTxE/lGtyeP4tG/VQ6UHMOtHtX64h11Q3oSyrjKwYfOQ8+hSEkkzzngWOfPwHTwwZNiss3I3Y8HCGjAAAznuAAAAAAAAYOpSrG0kj+JAAAx3Tfu0fIN037tHyABYqN037tHyDdN+7R8iAAB83TZGWEJ+Q/YAEMlAAAQSAAAB/9k=';
	}
	
	function get_audio_icon() {
		return 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAYEBQYFBAYGBQYHBwYIChAKCgkJChQODwwQFxQYGBcUFhYaHSUfGhsjHBYWICwgIyYnKSopGR8tMC0oMCUoKSj/2wBDAQcHBwoIChMKChMoGhYaKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCj/wAARCAAyAGQDASIAAhEBAxEB/8QAHAABAAIDAQEBAAAAAAAAAAAAAAUHAQIGBAgD/8QAOBAAAQMDAgIGBwYHAAAAAAAAAQACAwQFEQYhEjEHE0FRcYEIFDJSYZHBFSIkQqGxI0NTcoLR4v/EABgBAQEBAQEAAAAAAAAAAAAAAAADBAEC/8QAIREBAAICAQQDAQAAAAAAAAAAAAECAxFRBCExQRITMmH/2gAMAwEAAhEDEQA/APqlERARFG/b1q43tNfThzHujcC8bOacEeRBCCSUTTajtNVqOqsMFbG+7U0QnlpwDlrCcA5xg9mwO2Qub1Zr2jozJQ2iQVVwLQSWbiMHlv3qqeiqWdnTo6SqcTNV2+YOPfhwP0QfSCjNS1tTbtPXKtoKf1mrp6d8kUPvuAyApGQu4HCPhMmCWg8sqqdPXi80GozLdaqeWKR5jqIZHZbGc4y0chg93YrYcU33MevXKeS/x1HKJ6JOk28XK+m16slhlFWfws8cQj4H+4QOYPYeedt8q7lSettJR2/UkktCzq4Z/wARFwbcDs7geB38wrdsVY6vs9JUybSPjHH/AHDY/rlX6utJ1lxxqJTwTaN0v6e9ERYmgREQEREBVZJpGC41VZVuc0Olqpycux/NeFaaqGqobxPX1z6V8jIfW5w1vCeyVyDGn9KU9Pqa6s4o8MbEefewLnbDC2k9Ie2xx44TRzjbwct4p7vadQ3LrgZRwxl2Rg+yo3QdUbj072yY5yKSoJz2e1/tdFxRQzR3Z1TJIXTMlLS7PMZ5eGMLN9tsb7vM8AfxWNefHcH9gt6enuEt5fHUQOZGJC90v5HNzkYPx22Xi1FeGC8SxxuBMYEe3fuT+pwtte941wyz2rO+Ule6QVVHbHP3c0Fmf8f+QpHTkXUW8xjkHnCidTVgoKW3QvdiTBcR4AD6qT0vIZrSyY8pHOI8OX0U77+r+bUr+0uiIsqwiIgIiICIvylqGRDLuLyGUHivFop7nEesY0TAYbJjfwPwVK6BtM1J6QdfDJC5nqdte87bffeADn45KuOr1FRUuesbUHHuxEqLOurS2U4irOI7E+rO/fCDq5Gl0bmtcWkggOHZ8VXGmtIXGhvMlbf54PU6UmRrxJnrSN+J2eQHM5XTwauoJvYjqfOMhL1JR6gsddbJXVEUVZC6Fz2Nw5ocMZCrjyzTcR4l4vSLd+FRag1Y/VWr2wWrMjZHimpWjtGfa8DufBXtbKRtBb6eljOWwsDM9+O1Vz0WdGtLo+unuFVcHXOvcOCGQw9W2Fh54GT949p8h2qzwcq3VZaW1TF+YSwUtG7X8yIiLI0CIiAiIgIiIMFrTzaD5LXqoz+RvyREDqo/6bPktgxo5NHyREGcBERAREQEREH/2Q==';
	}
	
	function get_zip_icon() {
		return 'data:image/jpeg;base64,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';
	}
	
	function get_pdf_icon() {
		return 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAYEBQYFBAYGBQYHBwYIChAKCgkJChQODwwQFxQYGBcUFhYaHSUfGhsjHBYWICwgIyYnKSopGR8tMC0oMCUoKSj/2wBDAQcHBwoIChMKChMoGhYaKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCj/wAARCAAyAGQDASIAAhEBAxEB/8QAHAABAAIDAQEBAAAAAAAAAAAAAAUGAwQHCAEC/8QAOxAAAQMDAQMHCQYHAAAAAAAAAQACAwQFEQYHEiETMTJBUWHRFlVxcnOBkpSyFCIjJTSzNUJSVGKhsf/EABsBAQADAQEBAQAAAAAAAAAAAAADBAUCBgEH/8QAKhEAAQQBAgQFBQEAAAAAAAAAAQACAxEEEiEFQWGBBiIxUZETMjOx0fD/2gAMAwEAAhEDEQA/APVKIiIijmyOlr6prnuDY3Na0BxA6IPV6VIqHb/Eq72jf22oi34m7x4uf8bvFVLTuoa2sulKyvZA2krnTsgETniSF8TsFjyTgkjjkYxgq4Qcyod6pX2bX1klBY22XCtfJlzsclUGFzSB3P4H1ge1QyktohaXD445RJG8b0SOwJodfQ9q5q/8k3tf8Z8V+HxgDgX/ABu8VmXx/RKmWao+YuGQHP8AjPis9skfLRMdIS5285uT3OIH/FhqFks/6BvryfW5EW4iIiIiIiIiIiIoZp/M6/2jf22qZUEXYulw9q39tiIpWByq+paSkv2paS21jQ+jo6aSoqSTgNL8Nj49Thh5B6sAqP1TqavoribXbIgypdEHxyPidK6Zzs4bEwYBxj7znEBvYVt2HRVGIhVak/NrxORJUyzuLoy/HM2Po4A4Dh1Ku931DoaL91r40IxGDJldpJHlrc78+Qqut3Wy16HWlFZKplsvl4o6uHmguEczXkgfyzBvRd/lzHuKmDrfTjmBzLrA5p5nNDnA+8BTUNJR08RjgpYI4yMFrIwBj0BQNTpa2NkdJbnVdrkccuNBOYmk97OLP9L7plaNiCuTLgTOt7XNPQij1qtu19AFtUV4t11a91traeq3OmI3gub6Rzj3qSs/6BvryfW5V6hskVDcZK+SsrK2sdEIBLUuZlrM5wA1oHP1nKsFkObc32kn1uUrS4jzKhOIg+oTY6/4foLeREXShRERERERERcG2h7R7rprXl4t1JBSSwNdE9placjMMZI4d67yvKG3Nj27ULy4tcGu5EtOOf8ABYqWfI+OLUw0bXp/CWHj5mcYsloc3Sdj72FYYds1+DcfZKAD0OU+doOtWUMdY+x0opZGse14GfuuOGuxnIBPDK4O2QgEdy6BcNbRCntNPbY2sDaGnpK2odGeULWP3nMbxxu8OccSs2LLeQdbyvbZ3h7FY5gxsdps73ew+fj1V6r9f62oDGKuxUsfKSiBp6Q5Q8zTgnBPYVoXrafqu0TCG5Wu3wTOBwwu3jw4HOCce9QVZqyy01xu9RRVNVVC7XCGpkDoOTbTRsk3zjid5/V1KnaxvMN31BXVlLTwwwSTSOYY49wvBcSHPH9S7lynNB0vN9v4qmBwOGaRomxmhtbmnDkORdtuSOtXzV0m2y3z+yt/wuXa9lt1nvehrdcqsMbPUOmc4MGAPxngY9wXkBxLj1r1jsRa5my+yNeCDibgfbPUvD55JZCHmxSoeL+E4WDiMfjxhri6tvairyiItdfniIiIiIiIiLQrbLa6+flq620VTNjd35oGPdjsyQiLiT7Vaw/zBa/kzYfMlr+Uj8F98mbD5ktfykfgiKqttPJmw+ZLZ8pH4L55M2HzJa/lI/BERE8mbD5ktfykfgpOmghpoGQ00UcMLBhscbQ1rR2ADmRFNDzWbxH0asiIinWYiIiIv//Z';
	}
	
	function get_other_icon() {
		return 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAYEBQYFBAYGBQYHBwYIChAKCgkJChQODwwQFxQYGBcUFhYaHSUfGhsjHBYWICwgIyYnKSopGR8tMC0oMCUoKSj/2wBDAQcHBwoIChMKChMoGhYaKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCj/wAARCAAyAGQDASIAAhEBAxEB/8QAGQABAAMBAQAAAAAAAAAAAAAAAAMFBgcI/8QAMhAAAAUEAAMECQUBAAAAAAAAAAECAwQFBhESBxMUCCExYRUWIjI4QVFzoSNSgYKxs//EABQBAQAAAAAAAAAAAAAAAAAAAAD/xAAUEQEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIRAxEAPwD1SAAAAAAADnzvGWwmnFtuV7C0maTLo5HcZf0FrH4iWtIrUGks1TaoTm23Y7XTululxBLQedcFlJkfeZeYDWAM5Tr3t6o3NIt6HUOZWI5rJyPyXC1NPve0adTx5GIrsv62rSmMxbgqXSSHm+ahPIdcynJlnKEmXiRgNQAzto3pQLv6v1dn9Z0unO/Rcb122199JZzqrw+g0QAAAAAAAAAAAAAA8o8Dp1twrrr/AK1HTybcIksFMbJZGrmHnXJH3i8uBptjtRUplhtDbTao6EIQkiSlJMkRERF4EK7s+29Sa/d1xJrMFmYlhJLaJws6K5h95C1uf4qKd9xj/iAcPfiZuD7kv/RD2k1st8SrYXK16dLDZublktecrOfLAm4e/EzcH3Jf+iPtINNv8TrWZeSS2nGW0LSfgZG8ojIB3S0H7cmQnZlqIp5xVr5bjkNpKCUpPyPBFnG35F8K6g0Sm0CEcOjQ2ocU1m4bbRYLY8ZP8ELEAAAAAAAAAAAAAAYqw+G9IsqpT51Kkz3nZpauFJcQpJe1nu1SX18wncN6RNv9m73ZM8qk0pCktJWjknqnUslrnw8xtQAcpuHgZbVdrk6qy51ZRImPKecS080SSNR5PBG2Z4/kSVfgjbdUg0qJIm1hLdNjnGZNDrZGpJrUvKstnk8qPwwOpAAxnDrh3SbB9Ieh5E97ruXzOqWhWNNsY1Sn955zn5DZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//Z';
	}
});
