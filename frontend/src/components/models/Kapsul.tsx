import { GroupProps } from "@react-three/fiber";
import React from "react";
import { useGLTF } from "@react-three/drei";
import { Mesh } from "three";

const Kapsul: React.FC<GroupProps> = (props) => {
  const { nodes, materials } = useGLTF("/3D/kapsul.glb");
  return (
    <group {...props} dispose={null}>
      <group rotation={[0, 0, -Math.PI / 2]}>
        <mesh
          castShadow
          receiveShadow
          geometry={(nodes.Cylinder_1 as Mesh).geometry}
          material={materials["Material.001"]}
        />
        <mesh
          castShadow
          receiveShadow
          geometry={(nodes.Cylinder_2 as Mesh).geometry}
          material={materials["Material.002"]}
        />
      </group>
    </group>
  );
};

export default Kapsul;
