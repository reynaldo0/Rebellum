import * as THREE from "three";
import { useGLTF } from "@react-three/drei";
import { GLTF } from "three-stdlib";

type GLTFResult = GLTF & {
  nodes: {
    Cylinder: THREE.Mesh;
  };
  materials: {
    ["Material.001"]: THREE.MeshStandardMaterial;
  };
};

const Obat = (props: JSX.IntrinsicElements["group"]) => {
  const { nodes, materials } = useGLTF("/3D/obat.glb") as GLTFResult;
  return (
    <group {...props} dispose={null}>
      <mesh
        geometry={nodes.Cylinder.geometry}
        material={materials["Material.001"]}
      />
    </group>
  );
};

useGLTF.preload("/obat.glb");

export default Obat;
