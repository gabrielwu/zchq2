var YTabs = function(){
	var A = '[object Array]', D = document,isArray = function(s){
		return OP.toString.apply(s) === A;
	}, isString = function(s){
		return typeof s === 'string';
	}, IE = navigator.userAgent.match(/MSIE\s([^;]*)/), nt = "nodeType", OP = Object.prototype;
	
	return {
		stopEvent: function(evt){
			this.stopPropagation(evt);
			this.preventDefault(evt);
		},
		stopPropagation: function(evt){
			if (evt.stopPropagation) {
				evt.stopPropagation();
			}
			else {
				evt.cancelBubble = true;
			}
		},
		preventDefault: function(evt){
			if (evt.preventDefault) {
				evt.preventDefault();
			}
			else {
				evt.returnValue = false;
			}
		},
		get: function(elem){
			var elemID, E, m, i, k, length, len;
			if (elem) {
				if (elem[nt] || elem.item) {
					return elem;
				}
				if (isString(elem)) {
					elemID = elem;
					elem = D.getElementById(elem);
					if (elem && elem.id === elemID) {
						return elem;
					}
					else {
						if (elem && elem.all) {
							elem = null;
							E = D.all[elemID];
							for (i = 0, len = E.length; i < len; i += 1) {
								if (E[i].id === elemID) {
									return E[i];
								}
							}
						}
					}
					return elem;
				}
				else {
					if (elem.DOM_EVENTS) {
						elem = elem.get("element");
					}
					else {
						if (isArray(elem)) {
							m = [];
							for (k = 0, length = elem.length; k < length; k += 1) {
								m[m.length] = YTabs.get(elem[k]);
							}
							return m;
						}
					}
				}
			}
			return null;
		},
		hasClass: function(elem, className){
			var has = new RegExp("(?:^|\\s+)" + className + "(?:\\s+|$)");
			return has.test(elem.className);
		},
		addClass: function(elem, className){
			if (this.hasClass(elem, className)) {
				return;
			}
			elem.className = [elem.className, className].join(" ");
		},
		removeClass: function(elem, className){
			var replace = new RegExp("(?:^|\\s+)" + className + "(?:\\s+|$)", "g");
			if (!this.hasClass(elem, className)) {
				return;
			}
			var o = elem.className;
			elem.className = o.replace(replace, " ");
			if (this.hasClass(elem, className)) {
				this.removeClass(elem, className);
			}
		},
		getByClassName: function(className, tag, rootTag){
			var elems = [], i, tempCnt = D.getElementById(rootTag).getElementsByTagName(tag), len = tempCnt.length;
			for (i = 0; i < len; i++) {
				if (YTabs.hasClass(tempCnt[i], className)) {
					elems.push(tempCnt[i]);
				}
			}
			if (elems.length < 1) {
				return false;
			}
			else {
				return elems;
			}
		},
		tabs: function(){
			var j, len = arguments.length;
			for (j = 0; j < len; j += 1) {
				(function(config){
					var tabCnt = (config.tabId) ? YTabs.get(config.tabId) : (config.tabRoot || null), tabs = (config.tTag) ? tabCnt.getElementsByTagName(config.tTag) : (config.tabs || null), contents = (config.cTag) ? tabCnt.getElementsByTagName(config.cTag) : (config.contents || null), defaultClass = config.defaultClass || 'current', defaultIndex = config.defaultIndex || 0, lastIndex = defaultIndex, previousClass = config.previousClass || '', previousClassTab = null, hideAll = config.hideAll || false, evtName = config.evt || 'mouseover', i = 0, length = tabs.length, lastTab = tabs[defaultIndex], lastTabClass = config.lastTabClass || '', lastContent = contents[defaultIndex], auto = config.auto || false, timer = null, speed = config.speed || 6000, isPause = false, fadeUp = config.fadeUp || false, currentImage = null, autoChange = function(){
						if (!isPause) {
							var currentContent = null, currentTab = null;
							if (timer) {
								clearTimeout(timer);
							}
							lastIndex = lastIndex + 1;
							if (lastIndex === tabs.length) {
								lastIndex = 0;
							}
							currentContent = contents[lastIndex];
							currentTab = tabs[lastIndex];
							YTabs.removeClass(lastTab, (YTabs.hasClass(lastTab, defaultClass) ? defaultClass : 'current'));
							if (currentTab === tabs[defaultIndex]) {
								YTabs.addClass(currentTab, defaultClass);
							}
							else {
								YTabs.addClass(currentTab, 'current');
							}
							if (previousClass) {
								if (previousClassTab) {
									YTabs.removeClass(previousClassTab, previousClass);
								}
								if (lastIndex !== 0) {
									YTabs.addClass(tabs[lastIndex - 1], previousClass);
									if ((lastIndex - 1) === defaultIndex) {
										YTabs.removeClass(tabs[lastIndex - 1], defaultClass);
									}
									previousClassTab = (tabs[lastIndex - 1]);
								}
							}
							lastContent.style.display = "none";
							currentContent.style.display = "block";
							if (fadeUp) {
								currentImage = currentContent.getElementsByTagName('img')[0] || currentContent;
								YTabs.fadeUp(currentImage);
							}
							lastContent = currentContent;
							lastTab = currentTab;
							timer = setTimeout(autoChange, speed);
						}
						else {
							timer = setTimeout(autoChange, speed);
							return false;
						}
					};
					if (auto) {
						timer = setTimeout(autoChange, speed);
					}
					if (tabs && contents) {
						if (!hideAll) {
							YTabs.addClass(lastTab, defaultClass);
							lastContent.style.display = 'block';
						}
						else {
							YTabs.removeClass(lastTab, defaultClass);
							lastContent.style.display = 'none';
						}
						for (; i < length; i += 1) {
							if (i !== defaultIndex) {
								YTabs.removeClass(tabs[i], 'current');
								contents[i].style.display = 'none';
							}
							
							tabs[i]['on' + evtName] = function(index){
								return function(event){
									var evt = null, currentContent = contents[index];
									YTabs.removeClass(lastTab, (YTabs.hasClass(lastTab, defaultClass) ? defaultClass : 'current'));
									if (this === tabs[defaultIndex]) {
										YTabs.addClass(this, defaultClass);
									}
									else {
										YTabs.addClass(this, 'current');
									}
									if (previousClass) {
										if (previousClassTab) {
											YTabs.removeClass(previousClassTab, previousClass);
										}
										if (index !== 0) {
											YTabs.addClass(tabs[index - 1], previousClass);
											if ((index - 1) === defaultIndex) {
												YTabs.removeClass(tabs[index - 1], defaultClass);
											}
											previousClassTab = (tabs[index - 1]);
										}
									}
									lastContent.style.display = "none";
									currentContent.style.display = "block";
									if (fadeUp) {
										if (lastContent !== currentContent) {
											currentImage = contents[index].getElementsByTagName('img')[0] || contents[index];
											YTabs.fadeUp(currentImage);
										}
									}
									lastContent = currentContent;
									lastTab = this;
									lastIndex = index;
									if (auto) {
										isPause = true;
									}
									evt = event || window.event;
									YTabs.stopEvent(evt);
								}
							}(i);
							tabs[i]['onmouseout'] = function(index){
								return function(){
									if (hideAll && evtName === 'mouseover') {
										if (lastTab === this) {
											YTabs.removeClass(this, (YTabs.hasClass(this, defaultClass) ? defaultClass : 'current'));
										}
										if (previousClassTab) {
											YTabs.removeClass(previousClassTab, previousClass);
										}
										contents[index].style.display = 'none';
									}
									else {
										if (auto) {
											isPause = false;
										}
									}
								}
							}(i);
						}
					}
				})(arguments[j]);
			}
		},
		setOpacity: function(el, val){
			if (IE) {
				if (isString(el.style.filter)) {
					el.style.filter = 'alpha(opacity=' + val * 100 + ')';
					if (!el.currentStyle || !el.currentStyle.hasLayout) {
						el.style.zoom = 1;
					}
				}
			}
			else {
				el.style['opacity'] = val;
			}
		},
		fadeUp: function(elem){
			if (elem) {
				var level = 0, fade = function(){
					var tt = null;
					level += 0.05;
					if (tt) {
						clearTimeout(tt);
					}
					if (level > 1) {
						YTabs.setOpacity(elem, 1);
						return false;
					}
					else {
						YTabs.setOpacity(elem, level);
					}
					tt = setTimeout(fade, 50);
				};
				fade();
			}
		},
		moveElement: function(element, finalX, finalY, speed){
			var elem = (typeof element === 'string') ? YTabs.get(element) : element, style = null;
			if(!elem){
				return false;
			}
			style = elem.style;
			if (timer) {
				clearTimeout(timer);
			}
			if (!style.left) {
				style.left = '0';
			}
			if (!style.top) {
				style.top = '0';
			}
			var xpos = parseInt(style.left, 10);
			var ypos = parseInt(style.top, 10);
			if (xpos == finalX && ypos == finalY) {
				return true;
			}
			if (xpos < finalX) {
				var dist = Math.ceil((finalX - xpos) / 10);
				xpos = xpos + dist;
			}
			if (xpos > finalX) {
				var dist = Math.ceil((xpos - finalX) / 10);
				xpos = xpos - dist;
			}
			if (ypos < finalY) {
				var dist = Math.ceil((finalY - ypos) / 10);
				ypos = ypos + dist;
			}
			if (ypos > finalY) {
				var dist = Math.ceil((ypos - finalY) / 10);
				ypos = ypos - dist;
			}
			style.left = xpos + 'px';
			style.top = ypos + 'px';
			var timer = setTimeout(function(){
				YTabs.moveElement(element, finalX, finalY, speed);
			}, speed);
		}
	};
}();