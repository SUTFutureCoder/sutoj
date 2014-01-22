						
						    var widths=1000;              
                            var heights=450;              
                            var counts=5;   
                            img1=new Image ();img1.src='../logo/one.jpg'; 
                            img2=new Image ();img2.src='../logo/two.jpg'; 
                            img3=new Image ();img3.src='../logo/three.jpg'; 
                            img4=new Image ();img4.src='../logo/four.jpg';  
                            img5=new Image ();img5.src='../logo/five.jpg'; 

                            url1=new Image ();url1.src='photonews_findByPage.action?currentPage=1&pageSize=10';
                            url2=new Image ();url2.src='photonews_findByPage.action?currentPage=1&pageSize=10';
                            url3=new Image ();url3.src='photonews_findByPage.action?currentPage=1&pageSize=10';
                            url4=new Image ();url4.src='photonews_findByPage.action?currentPage=1&pageSize=10';
                            url5=new Image ();url5.src='photonews_findByPage.action?currentPage=1&pageSize=10';
							              
                            
                            var nn=1;
                            var key=0;
                            function change_img()
                            {if(key==0){key=1;}
                            else if(document.all)
                            {document.getElementById("pic").filters[0].Apply();document.getElementById("pic").filters[0].Play(duration=2);}
                            eval('document.getElementById("pic").src=img'+nn+'.src');
                            eval('document.getElementById("url").href=url'+nn+'.src');
                            for (var i=1;i<=counts;i++){document.getElementById("xxjdjj"+i).className='axx';}
                            document.getElementById("xxjdjj"+nn).className='bxx';
                            nn++;if(nn>counts){nn=1;}
                            tt=setTimeout('change_img()',2000);}
                            function changeimg(n){nn=n;window.clearInterval(tt);change_img();}
                            document.write('<style>');
                            document.write('.axx{padding:1px 7px;border-left:#cccccc 1px solid;}');
                            document.write('a.axx:link,a.axx:visited{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:#666;}');
                            document.write('a.axx:active,a.axx:hover{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:#999;}');
                            document.write('.bxx{padding:1px 7px;border-left:#cccccc 1px solid;}');
                            document.write('a.bxx:link,a.bxx:visited{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:#D34600;}');
                            document.write('a.bxx:active,a.bxx:hover{text-decoration:none;color:#fff;line-height:12px;font:9px sans-serif;background-color:#D34600;}');
                            document.write('</style>');
                            document.write('<div style="width:'+widths+'px;height:'+heights+'px;overflow:hidden;text-overflow:clip;">');
                            document.write('<div><a id="url"><img id="pic" style="border:0px;filter:progid:dximagetransform.microsoft.wipe(gradientsize=1.0,wipestyle=4, motion=forward)" width='+widths+' height='+heights+' /></a></div>');
                            document.write('<div style="filter:alpha(style=1,opacity=10,finishOpacity=80);background: #888888;width:100%-2px;text-align:right;top:-12px;position:relative;margin:10px;height:10px;padding:0px;margin:0px;border:0px;">');
                            for(var i=1;i<counts+1;i++){document.write('<a href="javascript:changeimg('+i+');" id="xxjdjj'+i+'" class="axx" target="_self">'+i+'</a>');}
                            document.write('</div></div>');
                            change_img();
