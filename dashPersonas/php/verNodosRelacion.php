<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

     
  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/ctm-model.css">
</head>

<body id="page-top" style="padding-top: 0px;">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon">
                    <i class="fa-brands fa-cc-mastercard"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Fraude <sup>Bancario</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Control de Datos</span></a>
            </li>

           <!-- Divider -->
            <hr class="sidebar-divider">

            
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Datos</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Visualizar:</h6>
                        <a class="collapse-item" href="mostrarTitulares.php">Personas</a>
                        <a class="collapse-item" href="buscarTitulares.php">Relacionar Personas</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Nodos
            </div>

          <!-- Nav Item - Charts -->
          <li class="nav-item  active">
            <a class="nav-link" href="verNodos.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Visualizar Nodos</span></a>
        </li>

        <li class="nav-item">
                <a class="nav-link" href="verNodosRelacion.php">
                <i class="fas fa-project-diagram"></i>
                    <span>Buscar Relación entre Nodos</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

        <div id="content-wrapper" class="d-flex flex-column">

                <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                     <!-- Sidebar Toggle (Topbar) -->
                     <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <div class="row">
      <div class="col col-12 col-md-12 form-inline">
        <input type="text" class="form-control form-control-sm" size="40px" id="queryText" placeholder="Buscar por cedula" /> 
        <input type="text" class="form-control form-control-sm" size="40px" id="queryText2" placeholder="Buscar por cedula 2" />
        <button type="button" class="btn btn-outline-primary btn-sm" id="btnSend">
          <i class="fa fa-check" aria-hidden="true"></i> Buscar&nbsp;
        </button> &nbsp;
       <!--    <input class="form-check-input" type="checkbox" id="chkboxCypherQry" value="1" />
     <label class="form-check-label" for="chkboxCypherQry">Use Cypher Query</label> -->
      </div>
    </div>
                            </div>
                        </div>
                    </form>
                    
                </nav>

                
              <!-- Begin Page Content -->
              <div class="container-fluid">

              <hr/>

              <div class="container-fluid">
                <div class="row">
                  <div class="col col-12 col-md-12" id="graphContainer">
                    <svg id="resultSvg"></svg>
                  </div>
                </div>
                <div class="row">
                  <div class="col col-12 col-md-12">
                    <div id="propertiesBox">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.container-fluid -->
         </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/d3.v5.min.js"></script>
  <script src="../js/d3js-example-neo4j.js"></script>
  <script type="text/javascript">
    "use strict";

 //######################### const #########################
 var graphWidth = 1024;
    var graphHeight = 450;

    var neo4jAPIURL = 'http://localhost:7474/db/radical/tx/commit';
    var neo4jLogin = 'neo4j';
    var neo4jPassword = '123';

    var circleSize = 30;
    var textPosOffsetY = 5;
    var arrowWidth = 5;
    var arrowHeight = 5;

    var collideForceSize = circleSize * 1.5;
    var linkForceSize = 150;

    var iconPosOffset = {'lock': [-40, -50], 'cross': [18, -50]};

    var linkTypeMapping = {'OUT_ADD': '+', 'OUT_SUB': '-', 'IN_AND': 'AND', 'IN_OR': 'OR'};

    var lockIconSVG = 'm18,8l-1,0l0,-2c0,-2.76 -3.28865,-5.03754 -5,-5c-1.71135,0.03754 -5.12064,0.07507 -5,4l1.9,0c0,-1.71 1.39,-2.1 3.1,-2.1c1.71,0 3.1,1.39 3.1,3.1l0,2l-9.1,0c-1.1,0 -2,0.9 -2,2l0,10c0,1.1 0.9,2 2,2l12,0c1.1,0 2,-0.9 2,-2l0,-10c0,-1.1 -0.9,-2 -2,-2zm0,12l-12,0l0,-10l12,0l0,10z';

    var crossIconSVG = 'M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z';

    var boxSVG = 'M0 0 L23 0 L23 23 L0 23 Z';

    //######################### variable #########################
    var nodeItemMap = {};
    var linkItemMap = {};

    var d3Simulation = null;
    var circles;
    var circleText;
    var lines;
    var lineText;
    var iconLock;
    var iconCross;

    var itemColorMap = {};
    var colorScale = d3.scaleOrdinal(d3.schemeSet2);

    var drag_handler = d3.drag()
      .on('start', drag_start)
      .on('drag', drag_move)
      .on('end', drag_end);

    var zoom_handler = d3.zoom()
      .filter(function() {
        //Only enable wheel zoom and mousedown to pan
        return (d3.event.type == 'wheel' | d3.event.type == 'mousedown');
      })
      .on('zoom', zoom_actions);

    function unfreezeItms() {
      var nodeItmArray = d3Simulation.nodes();
      if (nodeItmArray != null) {
        nodeItmArray.forEach(function(nodeItm) {
          if (nodeItm.fx != null) {
            nodeItm.fx = null;
            nodeItm.fy = null;
          }
        });
      }
    }

    function drag_start(d) {
      //if (!d3.event.active && d3Simulation != null)
      d3Simulation.alphaTarget(0.3).restart();
      d.fx = d.x;
      d.fy = d.y;
    }

    function drag_move(d) {
      d.fx = d3.event.x;
      d.fy = d3.event.y;
    }

    function drag_end(d) {
      if (!d3.event.active && d3Simulation != null)
        d3Simulation.alphaTarget(0);
      //d.fx = null;
      //d.fy = null;
    }

    function zoom_actions(){
      d3.select('#resultSvg').select('g').attr('transform', d3.event.transform);
    }

    function initGraph() {
      var svg = d3.select('#resultSvg');
      var zoomGLayer = svg.append('svg:g');


      var centerX = graphWidth / 2;
      var centerY = graphHeight / 2;

      svg.attr('width', graphWidth)
        .attr('height', graphHeight);

      /*
      var defs = svg.append('defs');
      Not use marker as IE does not support it and so embed the arrow in the path directly
      // define arrow markers for graph links
      defs.append('marker')
        .attr('id', 'end-arrow')
        .attr('viewBox', '0 -5 10 10')
        .attr('refX', 10)
        .attr('markerWidth', 5)
        .attr('markerHeight', 5)
        .attr('orient', 'auto')
        .append('path')
        .attr('d', 'M0,-5L10,0L0,5');
      */

      zoomGLayer.append('svg:g').attr('id', 'circle-group').attr('transform', 'translate(' + centerX + ',' + centerY + ')');
      zoomGLayer.append('svg:g').attr('id', 'text-group').attr('transform', 'translate(' + centerX + ',' + centerY + ')');
      zoomGLayer.append('svg:g').attr('id', 'path-group').attr('transform', 'translate(' + centerX + ',' + centerY + ')');
      zoomGLayer.append('svg:g').attr('id', 'path-label-group').attr('transform', 'translate(' + centerX + ',' + centerY + ')');
      zoomGLayer.append('svg:g').attr('id', 'control-icon-group').attr('transform', 'translate(' + centerX + ',' + centerY + ')');

      zoom_handler(svg);
    }

    function stopSimulation() {
      if (d3Simulation != null) {
        d3Simulation.stop()
          .on('tick', null);
        d3Simulation = null;
        circleText.remove();
      }
    }

    function tick() {
      lines.attr('d', drawLine);
      lineText.attr('transform', transformPathLabel);
      circles.attr('transform', transform);
      circleText.attr('transform', transform);

      iconLock.attr('transform', function(d) {return transformIcon(d, 'lock');});
      iconCross.attr('transform', function(d) {return transformIcon(d, 'cross');});
    }

    function transformIcon(d, type) {
      var sourceX = d.x + iconPosOffset[type][0];
      var sourceY = d.y + iconPosOffset[type][1];
      return 'translate(' + sourceX + ',' + sourceY + ')';
    }    

    function transformPathLabel(d) {
      var sourceX = d.source.x + ((d.target.x - d.source.x) / 2);
      var sourceY = d.source.y + ((d.target.y - d.source.y) / 2);
      return 'translate(' + sourceX + ',' + sourceY + ')';
    }

    function transform(d) {
      return 'translate(' + d.x + ',' + d.y + ')';
    }

    function drawLine(d) {
      var deltaX, deltaY, dist, cosTheta, sinTheta, sourceX, sourceY, targetX, targetY;
      
      deltaX = d.target.x - d.source.x;
      deltaY = d.target.y - d.source.y;
      dist = Math.sqrt(deltaX * deltaX + deltaY * deltaY);
      cosTheta = deltaX / dist;
      sinTheta = deltaY / dist;
      sourceX = d.source.x + (circleSize * cosTheta);
      sourceY = d.source.y + (circleSize * sinTheta);
      targetX = d.target.x - (circleSize * cosTheta);
      targetY = d.target.y - (circleSize * sinTheta);

      //Not use marker as IE does not support it and so embed the arrow in the path directly
      var arrowLeftX, arrowLeftY, arrowRightX, arrowRightY;

      arrowLeftX = targetX - (arrowHeight * sinTheta) - (arrowWidth * cosTheta);
      arrowLeftY = targetY + (arrowHeight * cosTheta) - (arrowWidth * sinTheta);
      arrowRightX = targetX + (arrowHeight * sinTheta) - (arrowWidth * cosTheta);
      arrowRightY = targetY - (arrowHeight * cosTheta) - (arrowWidth * sinTheta);

      return 'M' + sourceX + ' ' + sourceY + ' L' + targetX + ' ' + targetY
        + ' M' + targetX + ' ' + targetY + ' L' + arrowLeftX + ' ' + arrowLeftY
        + ' L' + arrowRightX + ' ' + arrowRightY + ' Z';
    }

    function clearProperties() {
      $('#propertiesBox').empty();
    }

    function showProperties(d) {
      clearProperties();

      var propertiesText = 'id: ' + d.id;
   
      //For nodes
      if (d.labels != null)
        propertiesText += ', labels: ' + d.labels.join(', ');
      //For links
      if (d.type != null)
        propertiesText += ', type: ' + d.type;

      $.map(d.properties, function(value, key) {
        propertiesText += ', ' + key + ': ' + value;
      });

      $('#propertiesBox').append($('<p></p>').text(propertiesText));
    }

    function replaceLinkTypeName(d) {
      var linkTypeName = linkTypeMapping[d.type];
      if (linkTypeName == null)
        return d.type;
      return linkTypeName;
    }


    function generateCircleClasses(d) {
      if (d.properties != null && d.properties.cyclic == '1')
        return 'Cyclic ' + d.labels.join(' ');
      return d.labels.join(' ');
    }

    function removeNode(d) {
      delete nodeItemMap[d.id];
      $.map(linkItemMap, function(value, key) {
        if (value.startNode == d.id || value.endNode == d.id)
          delete linkItemMap[key];
      });
    }

    function updateGraph() {
      var d3LinkForce = d3.forceLink()
        .distance(linkForceSize)
        .links(mapToArray(linkItemMap))
        .id(function(d) {return d.id;});

      d3Simulation = d3.forceSimulation()
        //.force('chargeForce', d3.forceManyBody())//.strength(-300)
        .force('collideForce', d3.forceCollide(collideForceSize))
        .nodes(mapToArray(nodeItemMap))
        .force('linkForce', d3LinkForce);

      circles = d3.select('#circle-group').selectAll('circle')
        .data(d3Simulation.nodes(), function(d) {return d.id;});
      circleText = d3.select('#text-group').selectAll('text')
        .data(d3Simulation.nodes(), function(d) {return d.id;});
      lines = d3.select('#path-group').selectAll('path')
        .data(d3LinkForce.links(), function(d) {return d.id;});
      lineText = d3.select('#path-label-group').selectAll('text')
        .data(d3LinkForce.links(), function(d) {return d.id;});

      iconLock = d3.select('#control-icon-group').selectAll('g.lockIcon')
          .data([], function(d) {return d.id;});
      iconCross = d3.select('#control-icon-group').selectAll('g.crossIcon')
          .data([], function(d) {return d.id;});

      iconLock.exit().remove();
      iconCross.exit().remove();


      circles.exit().remove();   
      circles = circles.enter().append('svg:circle')
        
        .attr('r', circleSize)
////////////////////////////////////////////////////////////////////////////////////////
        .attr('fill', getItemColor)
        
////////////////////////////////////////////////////////////////////////////////////////

        .attr('title', function(d) {return d.labels.join('-');})
        .attr('class', function(d) {return generateCircleClasses(d);})
        .call(drag_handler)
        .on('mouseover', function(d) {

////////////////////////////////////////////////////////////////////////////////////////
          d3.select(this)
            .attr('fill', function(d) {return getColorBrighter(getItemColor(d));})
            .attr('stroke', getItemColor);

////////////////////////////////////////////////////////////////////////////////////////

          showProperties(d);
        })
     
        .on('dblclick', function(d) {
          d.fx = d.x;
          d.fy = d.y;
          submitQuery(d.id);
          circleText.remove();
        })

        /*
        .on('click', function(d) {
          iconLock = d3.select('#control-icon-group').selectAll('g.lockIcon')
            .data([d], function(d) {return d.id;});
          iconCross = d3.select('#control-icon-group').selectAll('g.crossIcon')
            .data([d], function(d) {return d.id;});

          iconLock.exit().remove();
          iconLock.remove();
          iconCross.exit().remove();
          iconCross.remove();
       
      

          var iconLockEnter = iconLock.enter().append('svg:g')
            .attr('class', 'lockIcon')
            .attr('transform', function(d) {
              return transformIcon(d, 'lock');
            })
            .on('click', function(d) {
              d.fx = null;
              d.fy = null;
              

              iconLock.remove();
              iconCross.remove();
            });

          iconLockEnter.append('svg:path').attr('class', 'overlay').attr('d', boxSVG);
          iconLockEnter.append('svg:path').attr('d', lockIconSVG);

          var iconCrossEnter = iconCross.enter().append('svg:g')
            .attr('class', 'crossIcon')
            .attr('transform', function(d) {
              return transformIcon(d, 'cross');
            })
            .on('click', function(d) {
              removeNode(d);
              updateGraph();
        
            });
          iconCrossEnter.append('svg:path').attr('class', 'overlay').attr('d', boxSVG);
          iconCrossEnter.append('svg:path').attr('d', crossIconSVG);
            
          iconLock = iconLockEnter
            .merge(iconLock);
          iconCross = iconCrossEnter
            .merge(iconCross);
        }) */
        .merge(circles);


          // Append images
    



      
      circleText = circleText.enter().append('image')
        .attr("xlink:href", function(d) {   return [ d.properties.img ];})
        .attr("x", function(d) { return -17;})
        .attr("y", function(d) { return -17;})
        .attr("height", 35)
        .attr("width", 35)
        .merge(circles);

        //0400730057




      lines.exit().remove();
      lines = lines.enter().append('svg:path')
        //.attr('marker-end', 'url(#end-arrow)')
        .attr('title', function(d) {return d.type;})
        .attr('class', function(d) {return d.type;})
        .on('mouseover', function(d) {
          showProperties(d);
        })
        .merge(lines);

      lineText.exit().remove();
      lineText = lineText.enter().append('text')
        .attr('y', textPosOffsetY)
        .attr('text-anchor', 'middle')
        .text(function(d) {return replaceLinkTypeName(d);})
        .merge(lineText);

      d3Simulation
        .on('tick', tick);
    }

  //  MATCH (start:Titular_de_la_cuenta {Cedula:"1750508234"}),(end:Titular_de_la_cuenta {Cedula:"1798742536"}) 
  //  Match p=shortestPath((start)-[*]-(end)) 
  //  RETURN nodes(p), relationships(p)

    function submitQuery(nodeID) {
      removeAlert();

      var queryStr = null;
      var queryStr2 = null;
      if (nodeID == null || !nodeID) {
        queryStr = $.trim($('#queryText').val());
        queryStr2 = $.trim($('#queryText2').val());
        if (queryStr == '' || queryStr2 == '')  {
          promptAlert($('#graphContainer'), 'Error: el texto de consulta no puede estar vacío !', true);
          return;
        }
        if ($('#chkboxCypherQry:checked').val() != 1)
          queryStr = 'match (start  where start.Cedula =~ \'(?i).*' + queryStr + '.*\'),(end  where end.Cedula =~ \'(?i).*' + queryStr2 + '.*\') Match p=shortestPath((start)-[*]-(end)) RETURN nodes(p), relationships(p) ';
      } else
        queryStr = 'match (n)-[j]-(k) where id(n) = ' + nodeID + ' return n,j,k';

      stopSimulation();
      

      if (nodeID == null || !nodeID) {
        nodeItemMap = {};
        linkItemMap = {};
      }

      var jqxhr = $.post(neo4jAPIURL, '{"statements":[{"statement":"' + queryStr + '", "resultDataContents":["graph"]}]}', 
        function(data) {
          //console.log(JSON.stringify(data));
          if (data.errors != null && data.errors.length > 0) {
            promptAlert($('#graphContainer'), 'Error: ' + data.errors[0].message + '(' + data.errors[0].code + ')', true);
            return;
          }

          if (data.results != null && data.results.length > 0 && data.results[0].data != null && data.results[0].data.length > 0) {
            var neo4jDataItmArray = data.results[0].data;
            neo4jDataItmArray.forEach(function(dataItem) {
              //Node
              if (dataItem.graph.nodes != null && dataItem.graph.nodes.length > 0) {
                var neo4jNodeItmArray = dataItem.graph.nodes;
                neo4jNodeItmArray.forEach(function(nodeItm) {
                  if (!(nodeItm.id in nodeItemMap))
                    nodeItemMap[nodeItm.id] = nodeItm;
                });
              }
              //Link
              if (dataItem.graph.relationships != null && dataItem.graph.relationships.length > 0) {
                var neo4jLinkItmArray = dataItem.graph.relationships;
                neo4jLinkItmArray.forEach(function(linkItm) {
                  if (!(linkItm.id in linkItemMap)) {
                    linkItm.source = linkItm.startNode;
                    linkItm.target = linkItm.endNode;
                    linkItemMap[linkItm.id] = linkItm;
                  }
                });
              }
            });

            console.log('nodeItemMap.size:' + Object.keys(nodeItemMap).length);
            console.log('linkItemMap.size:' + Object.keys(linkItemMap).length);

            updateGraph();
            return;
          }

          //also update graph when empty
          updateGraph();
          promptAlert($('#graphContainer'), 'No encontrado!', false);
        }, 'json');

      jqxhr.fail(function(data) {
        promptAlert($('#graphContainer'), 'Error: se envió el texto de la consulta pero se recibió un mensaje de error (' + data + ')', true);
      });
    }


    //////////////////////////////////////////////////////////
    function getItemColor(d) {
      if (!(d.labels[0] in itemColorMap))
        itemColorMap[d.labels[0]] = colorScale(d.labels[0]);
      return itemColorMap[d.labels[0]];
    }

    function getColorBrighter(targetColor) {
      return d3.rgb(targetColor).brighter(0.3).toString();
    }

   //////////////////////////////////////////////////////////



    //Page Init
    $(function() {
      setupNeo4jLoginForAjax(neo4jLogin, neo4jPassword);

      initGraph();

      $('#queryText').keyup(function(e) {
        if(e.which == 13) {
          submitQuery();
        }
      });

      $('#btnSend').click(function() {submitQuery()});

      $('#chkboxCypherQry').change(function() {
        if (this.checked)
          $('#queryText').prop('placeholder', 'Cypher');
        else
          $('#queryText').prop('placeholder', 'Node Name');
      });
    });
  </script>
</body>
</html>