google.maps.__gjsload__('overlay', function(_){var Az=_.pa("b"),Bz=_.oa(),Cz=function(){var a=this.xf;if(this.getPanes()){if(this.getProjection()){if(!a.b&&this.onAdd)this.onAdd();a.b=!0;this.draw()}}else{if(a.b)if(this.onRemove)this.onRemove();else this.remove();a.b=!1}},Dz=function(a){a.xf=a.xf||new Bz;return a.xf},Ez=function(a){_.Sf.call(this);this.da=(0,_.p)(Cz,a)};_.t(Az,_.K);
Az.prototype.changed=function(a){"outProjection"!=a&&(a=!!(this.get("offset")&&this.get("projectionTopLeft")&&this.get("projection")&&_.x(this.get("zoom"))),a==!this.get("outProjection")&&this.set("outProjection",a?this.b:null))};_.t(Ez,_.Sf);_.je("overlay",{vk:function(a){if(a){a.getMap();var b=a.getMap(),c=Dz(a),d=c.Am;c.Am=b;d&&(c=Dz(a),(d=c.aa)&&d.unbindAll(),(d=c.Kh)&&d.unbindAll(),a.unbindAll(),a.set("panes",null),a.set("projection",null),_.u(c.P,_.G.removeListener),c.P=null,c.oe&&(c.oe.da(),c.oe=null),_.qn("Ox","-p",a));if(b){c=Dz(a);d=c.oe;d||(d=c.oe=new Ez(a));_.u(c.P||[],_.G.removeListener);var e=c.aa=c.aa||new _.Xk,f=b.__gm;e.bindTo("zoom",f);e.bindTo("offset",f);e.bindTo("center",f,"projectionCenterQ");e.bindTo("projection",
b);e.bindTo("projectionTopLeft",f);e=c.Kh=c.Kh||new Az(e);e.bindTo("zoom",f);e.bindTo("offset",f);e.bindTo("projection",b);e.bindTo("projectionTopLeft",f);a.bindTo("projection",e,"outProjection");a.bindTo("panes",f);e=(0,_.p)(d.N,d);c.P=[_.G.addListener(a,"panes_changed",e),_.G.addListener(f,"zoom_changed",e),_.G.addListener(f,"offset_changed",e),_.G.addListener(b,"projection_changed",e),_.G.addListener(f,"projectioncenterq_changed",e),_.G.forward(b,"forceredraw",d)];d.N();b instanceof _.Ud&&(_.nn(b,
"Ox"),_.pn("Ox","-p",a,!!b.Y))}}}});});
