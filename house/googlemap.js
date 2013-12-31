/*
  谷歌地图js文件
*/
jQuery(document).ready(function($){
  var map;
  var markers = [];
  function init(){
    //新的地点标记
    var latlng = $("#latlng").attr("value"),
    latlnga = new Array(),
    latlnga = latlng.split(",");
    if(latlng!='')
      var newLatlng = new google.maps.LatLng(latlnga[0],latlnga[1]);
    else
      var newLatlng = new google.maps.LatLng(-24.78274455116646, 133.505859375);
    var mapOptions = {
      zoom: 4,
      center: newLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
    if(latlng!=''){
    addMarker(newLatlng);
    /*如果latlng存在，则显示标记
      var marker = new google.maps.Marker({
        position: newLatlng,
        map: map,
      });*/
    }
    get_latlng();//获取位置信息，添加到隐藏表单
    /*搜索地点*/
    var input = (document.getElementById('search_place'));
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds',map);
    google.maps.event.addListener(autocomplete,'place_changed',function(){
      var place = autocomplete.getPlace();
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    });
  }
  //添加标记
  function addMarker(location){
    var marker = new google.maps.Marker({
      position: location,
      map: map,
      animation: google.maps.Animation.BOUNCE,
    });
    markers.push(marker);
  }
  //将所有的地标添加到markers数组
  function setAllMap(map) {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }  
  //彻底删除标记
  function deleteMarkers(){
    setAllMap(null);
    markers = [];
  }
  //处理经纬度数据,添加到
  function add_latlng(latlng){
    var latlng = latlng.toString().slice(1,-1);
    document.getElementById('latlng').value = latlng;
  }
  //单击获取地图位置事件
  function get_latlng(){
    google.maps.event.addListener(map,'click',function(event){
      deleteMarkers();
      addMarker(event.latLng);
      add_latlng(event.latLng);
    });
  }
  google.maps.event.addDomListener(window,'load',init);
});
