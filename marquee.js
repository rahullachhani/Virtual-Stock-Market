.style;x.left=(parseInt(x.left,10)-1)+'px';}y = mqr[j].ary[0].style;if (parseInt(y.left,10)+parseInt(y.width,10)<0) {z = mqr[j].ary.shift();z.style.left = (parseInt(z.style.left,10) + parseInt(z.style.width,10)*maxa) + 'px';   mqr[j].ary.push(z);}}};nodes = document.getElementsByClassName(cl);for (i = 0, ii = nodes.length; i < ii; i++) {mqr.push(new mq(nodes[i]));};if (mqr.length>0)mqr[0].TO=setInterval(function() {mqRotate(mqr);},speed);if (typeof ss == 'string'){sb = document.getElementsByClassName(ss);for (i = 0, ii = sb.length; i < ii; i++) {sb[i].innerHTML=''; b = document.createElement('button');b.innerHTML = ' Stop '; sb[i].appendChild(b); sb[i].onclick=function() {if (t) {t=false;mqr[0].TO=setInterval(function() {mqRotate(mqr);},speed);for (i = 0, ii = sb.length; i < ii; i++) sb[i].firstChild.innerHTML = ' Stop ';} else {t=true;clearInterval(mqr[0].TO);for (i = 0, ii = sb.length; i < ii; i++) sb[i].firstChild.innerHTML = 'Start';}};}}
})(50,'marquee','marqueess');